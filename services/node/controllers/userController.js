'use strict';
const {checkByField,saveUser,updateUser, checkByFields} = require('../db');
const {User} = require ('../models/User');
const {userValidate} = require ('../validation/user');
const {getRefreshKey,generateToken,generateRefreshToken, checkToken} = require ('../helpers/user');
const config = require("../config");
const {checkPassword, getPayloadData}  = require('../helpers/user.js');

const registerUser = async (req,res,next) => {
    try{
        const data = req.body;

        const user = new User(data);
            const newUser = userValidate(user);


            if(newUser.error){
                let error= newUser.error;
                res.status(400).send(error.msg)
            }
            const currentUser = await checkByField(newUser.email, "email");
        if(Array.isArray(currentUser) && currentUser.length){

                res.status(400).send("User with current email already exist!")

            }
        // если нет пользователя с таким email and validation OK - добавляем нового пользователя
            await saveUser(newUser.getData());

            res.send('You are registrated succesfully!')
    } catch (error) {
        res.status(400);
        res.send(error.msg)
    }
}
const loginUser = async (req,res,next) => {
     try{
        const data = req.body;
        //collection from db
        const loginedUser = await checkByField(data.email, "email");

        if(loginedUser[0] && checkPassword(loginedUser[0].password,data.password)){
            let refreshKey = getRefreshKey();
            let refreshToken = generateRefreshToken(loginedUser[0],refreshKey);
            let accessToken  = generateToken(loginedUser[0], config.access_token);
            await updateUser(loginedUser[0].name,{refreshToken: refreshKey});
            res.header('Authorization', accessToken);
            res.header('Refresh', refreshToken);
            res.send('You are logged in succesfully!')
        }else{
            res.status(400);
            res.send('Wrong password or email!');
        }
     } catch (error) {
        res.status(400);
        res.send(error.msg)
    }
}

const refreshToken = async (req,res,next) => {
    try{
        let refresh = req.header('refresh');
        let payloadData = getPayloadData(refresh.split('.')[1]);
        let loginedUser = await checkByField(payloadData.email, "email");
        if(loginedUser[0] && loginedUser[0].name === payloadData.id && checkToken(refresh,loginedUser[0].refreshToken)){
            let refreshKey = getRefreshKey();
            let refreshToken = generateRefreshToken(loginedUser[0],refreshKey);
            let accessToken  = generateToken(loginedUser[0], config.access_token);
            await updateUser(loginedUser[0].name,{refreshToken: refreshKey});
            res.header('Authorization', accessToken);
            res.header('Refresh', refreshToken);
            res.json({userdata:{name: loginedUser[0].username}});
            // res.send('Token refreshed succesfully!');
        }else{
            res.status(401);
            res.send("You are not authorized! Inapropriate refresh data!");
        }
    } catch (error) {
            res.status(401);
            res.send("You are not authorized!  Inapropriate refresh key!");
    }
}

const getUser = async (req,res,next) => {
    let refresh = req.header('authorization');
    let payloadData = getPayloadData(refresh.split('.')[1]);
    let loginedUser = await checkByField(payloadData.email, "email")
    res.status(200);
    res.json({userdata:{name:loginedUser[0].username}});
}
const logoutUser = async (req,res,next) => {
    let access = req.header('authorization');
    if(access){
        let payloadData = getPayloadData(access.split('.')[1]);
        let loginedUser = await checkByField(payloadData.email, "email");
        await updateUser(loginedUser[0].name,{refreshToken: ""});
    }
        res.status(200).json('You are logged out!!');
}
module.exports = {
    registerUser,
    loginUser,
    getUser,
    refreshToken,
    logoutUser
}
const config = require("../config")
const {checkToken} = require ('../helpers/user');

const auth = async (req,res2,next) => {
    try{
         const authStatus = checkToken(req.header('authorization'),config.access_token);
        if(authStatus){
             next();
         }
    } catch (e){
         res2.status(401).send("You are not authorized!")
    }
};

const refreshAuth = async (req,res,next) => {
    try{
        if(req.header('refresh') === "null"){
            throw new Error();
        }
         next();
    } catch(e) {
        res.status(400).send("Refresh key missed!")
    }
};

module.exports = {
    auth,
    refreshAuth
}

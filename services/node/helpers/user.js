const jwt = require('jsonwebtoken')
const crypto = require("crypto")

function generateToken(data, token)
{
    return jwt.sign({ id: data.name, email: data.email }, token, {expiresIn: '1m'},"");
}
function generateRefreshToken(data, token)
{
    return jwt.sign({ id: data.name, email: data.email }, token, {expiresIn: '15m'},"");
}
function getRefreshKey()
{
    return crypto.randomBytes(64).toString('hex');
}
function getPayloadData(base64str)
{
   return JSON.parse(Buffer.from(base64str, 'base64').toString());
}
function checkToken(token, key)
{
    return jwt.verify(token, key);
}
function checkPassword(passFromDb, passFromClient)
{
    return (passFromDb === createPassword(passFromClient));
}
function createPassword(password)
{
    return (crypto.createHmac('sha256',password).update(password).digest('base64'))
}

module.exports = {
    generateToken,
    getRefreshKey,
    createPassword,
    checkPassword,
    getPayloadData,
    checkToken,
    generateRefreshToken
}


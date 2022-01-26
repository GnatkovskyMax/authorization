const crypto = require('crypto');
const {createPassword}  = require('../helpers/user.js');
class User {
    name = "default";
    username;
    email;
    password;
    repeat_password;
    refreshToken = "default";
    constructor(data) {
        this.username = data.username;
        this.email = data.email;
        this.password = data.password;
        this.repeat_password = data.repeat_password;

    }
    getData() {
        return {
            username: this.username,
            name: this.name,
            email: this.email,
            password: createPassword(this.password),
            refreshToken: this.refreshToken
        };
    }
}
module.exports = {
    User: User
}
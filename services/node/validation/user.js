const Joi = require('joi');

const schema = Joi.object({
    username: Joi.string()
        .alphanum()
        .min(3)
        .max(30)
        .required(),
    name: Joi.string().allow(""),
    refreshToken: Joi.string().allow(""),
    password: Joi.string()
        .pattern(new RegExp('^[a-zA-Z0-9]{3,30}$')),

    repeat_password: Joi.ref('password'),

    email: Joi.string()
        .email({ minDomainSegments: 2, tlds: { allow: ['com', 'net'] } })
})
    .with('password', 'repeat_password');
const errorArr = {
    '"repeat_password" must be [ref:password]': 'Password and repetitive password must be equal',
    '"email" must be a valid email':'Email must be a valid email',
    '"username" is not allowed to be empty':"Name should be your name ar nikname and contain at least 3 symbols"
};

function userValidate(userData){
    const validData = schema.validate(userData);
   if(!validData["error"]){
       return validData.value;
   }
   let err = validData["error"].details[0].message;
   let type = validData["error"].details[0].path[0];

    return {error: {msg:errorArr[err], type:type}};
}

module.exports = {
    userValidate:userValidate
}

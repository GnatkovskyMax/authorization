const express = require('express');
const {registerUser, loginUser, refreshToken, getUser,logoutUser} = require('../controllers/userController');
const {auth, refreshAuth} = require('../middleware/auth');
const router = express.Router();

router.post('/register', registerUser);
router.post('/login', loginUser);
router.post('/logout',logoutUser);
router.post('/refresh',refreshAuth, refreshToken);
router.post('/user', auth ,getUser);

module.exports = {
    routes: router
}
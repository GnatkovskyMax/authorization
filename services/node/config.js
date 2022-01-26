'use strict';
const dotenv = require('dotenv');
const assert = require('assert');

dotenv.config();

const {
    ACCESS_TOKEN,
    PORT,
    HOST,
    HOST_URL,
    API_KEY,
    AUTO_DOMAIN,
    PROJECT_ID,
    STORAGE_BUCKET,
    MASSAGING_SENDER_ID,
    APP_ID,
    MEASUREMENT_ID,
} = process.env;
assert(PORT, 'PORT is required');
assert(HOST, 'HOST is required');

module.exports = {
    access_token: ACCESS_TOKEN,
    port: PORT,
    host: HOST,
    url: HOST_URL,
    firebaseConfig: {
        apiKey: API_KEY,
        authDomain: AUTO_DOMAIN,
        projectId: PROJECT_ID,
        storageBucket: STORAGE_BUCKET,
        messagingSenderId: MASSAGING_SENDER_ID,
        appId: APP_ID,
        measurementId: MEASUREMENT_ID,
    }
};
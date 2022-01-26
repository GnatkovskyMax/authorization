const { initializeApp } = require('firebase/app');
const { getFirestore, addDoc, updateDoc, doc, collection, getDocs, getDoc, where, query } = require('firebase/firestore/lite');
const {  } = require('firebase/firestore');

const config = require('./config');

const app = initializeApp(config.firebaseConfig);
const db = getFirestore(app);

const collect = collection(db,'students');

function saveUserTool(user) {
    return new Promise(resolve => {
        addDoc(collect, user).then((response) => {
            resolve(updateDoc(response, Object({name:response.id})));
        });
    });
};

async function saveUser(user){
    const userId = await saveUserTool(user)
    return userId;
}

async function updateUser(name, data={}) {
    const dbq = getFirestore(app);
    const userRef = doc(dbq,'students/'+name);
    await updateDoc(userRef, Object(data));
}


function checkStep1(value, field) {
    return new Promise(resolve => {
    resolve(where(field, "==", value));
});
};
function checkStep2(user) {
    return new Promise(resolve => {
        resolve(query(collect,user));
    });
};
function checkStep3(user) {
    return new Promise(resolve => {
        getDocs(user).then((response) => {
            resolve(response.docs.map(doc => doc.data()));
        });
    });
};
async function checkByField(value, field){
        const step1 = await checkStep1(value, field);
        const step2 = await checkStep2(step1);
        const step3 = await checkStep3(step2);
        return step3;
}

module.exports = {
    checkByField,
    saveUser,
    updateUser,
}


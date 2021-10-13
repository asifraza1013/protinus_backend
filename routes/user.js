var express = require("express");
var  router = express.Router();
var userController = require("../controllers/userController")

router.post("/login", userController.login)  

router.post("/addUser", userController.addUser) 
router.post("/getUser", userController.getUser)  
router.post("/getUserById", userController.getUserById) 
router.post("/deleteUser", userController.deleteUser) 
router.post("/updateUser", userController.updateUser)  

module.exports = router ;



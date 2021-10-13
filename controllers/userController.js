const User = require("../models/userModel.js");
var bcrypt = require('bcryptjs');
let request = require("request");
var mongoose = require("mongoose");


exports.login = async (req,res,next)=>{
 let  user = await User.findOne({email : req.body.email });
 if(user){
      bcrypt.compare(req.body.password, user.password , function (err, result){
         // console.log(result,"<======result 80")
         if(result == true){
              return  res.status(200).json({ code:200,status:1,message : "Login succesfull",data : user })            
         }else{
            return  res.status(200).json({ code:200,status:0,message : "Please check Inputs",data : {} })         
         }
      })
 }else{
     return res.status(200).json({ message: `The Email is not associated with any account. Double-check your Email and try again.`});
 }
}



exports.addUser= async (req,res)=>{
    console.log(req.body,"<>==========called")
	User.findOne({email: req.body.email},async function(err,result){
        if(result){
            return res.status(200).send({ code:200,status:0, message:"Already registerd",data:{} })  
            }
        let hash  = await bcrypt.hashSync(req.body.password,10);
        // console.log(hash,"<>==============hgas")
        user = new User({
            userName            : req.body.userName,
            email               : req.body.email,
            password            : hash,
            status           	  : req.body.status,
            subscriptionType    : req.body.subscriptionType,
            accountType         : req.body.accountType,
            employer            : req.body.employer                  
           
        }) 
        user.save(function(err ,result){
            if(err){
                console.log(err,"<==========err")
                res.status(401).json({ code:200,status:0,message : "Try Again ",data : {} })
            }else{
                 res.status(200).json({ code:200,status:1,message : "User Add succesfull",data : user })
            }   
        })  
	})	

}


exports.getUser = async (req, res, next) => {
    try{
            let user = await User.find({is_deleted: 0})
            if(user != "") {
                return res.status(200).json({status: 1, message: 'User Details fetched success!', user: user})
            }
            return res.status(200).json({status: 1, message: 'data Not Found!', user: {}})
        }
        catch(error){
            console.log(error)
            return res.status(200).json({status: 0, message: 'try again later!'})
        }
};

exports.getUserById = async (req, res, next) => {
    try{
            let user = await User.find({_id: req.body.userId, is_deleted: 0})
            if(user != "") {
                return res.status(200).json({status: 1, message: 'User Details fetched success!', user: user})
            }
            return res.status(200).json({status: 1, message: 'data Not Found!', user: {}})
        }
        catch(error){
            console.log(error)
            return res.status(200).json({status: 0, message: 'try again later!'})
        }
};

exports.deleteUser=async (req,res)=>{
     let  data = await User.findOneAndUpdate({_id : req.body.userId,is_deleted:0 },{is_deleted:1});
     if(data){
            return res.status(200).json({status:1, message:"User Deleted succesfully", data:data}) 
     }else{
         return res.status(200).json({status:0, message:"Data Not Found", data:cData})
     }
}

exports.updateUser = async (req, res, next) => {
    try{
         let hash  = await bcrypt.hashSync(req.body.password,10);
        let data = await User.findOneAndUpdate({_id:req.body.userId},{ 
                                                userName            : req.body.userName,
                                                email               : req.body.email,
                                                password            : hash,
                                                status              : req.body.status,
                                                subscriptionType    : req.body.subscriptionType,
                                                accountType         : req.body.accountType,
                                                employer            : req.body.employer
                                          } );
        if(data != ""){
            return res.status(200).json({status:1, message:'User Updated Succesfully',data:data})
        }
        return res.status(200).json({status:0, message:'Data Not Found',data:{}})
    }catch(error){
        console.log(error)
    }
};
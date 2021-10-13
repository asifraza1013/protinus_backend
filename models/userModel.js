var mongoose = require("mongoose");    
var userSchema = new mongoose.Schema({
    userName 		     : {type : String , default : ''},
    email 			     : {type :String ,required :true, unique :true ,match : /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/},
    password             : {type :String},
    status               : {type: String},
    subscriptionType     : {type: String},
    accountType          : {type : String},
    employer             : {type: String},
    is_deleted:{type:String,default:0}           
},{
    timestamps: true
})


module.exports = mongoose.model("User" , userSchema)
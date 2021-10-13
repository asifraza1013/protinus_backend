const express = require("express");
const app = express();
var mongoose = require("mongoose");
var bodyParser = require("body-parser");
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended : true}));
const path = require('path')

 mongoose.connect('mongodb+srv://m220user:m220password@cluster0-c5pdt.mongodb.net/Ecommerce?retryWrites=true&w=majority', { useNewUrlParser: true , useUnifiedTopology: true })

app.use(express.static(path.join(__dirname, 'public')))
app.use('/img',express.static('img'))


app.use(function(req, res, next) {
  res.header("Access-Control-Allow-Origin", "*");
  res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept,Authorization");
  if(req.method == 'OPTIONS'){
    req.header('Access-Control-Allow-Methods','PUT,POST, PATCH ,DELETE , GET ');
    return res.status(200).json({});
  }
  next();
});

app.use(bodyParser.json({limit: '50mb'}));
app.use(bodyParser.urlencoded({limit: '50mb', extended: true,  parameterLimit: 1000000}));

var user = require("./routes/user");



app.get("/",(req,res)=>{
	res.send(":hello")
})
app.use("/users",user);

app.listen(7000,()=>{
	console.log("server started");
})

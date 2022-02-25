const express = require("express");
const mod62 = require("./mod62");

let obje = new mod62();
app = express();
port = 5000;

app.get('/',function(req,res){
    res.header("Content-Type",'application/json');
    const resJson = 
    {
        welcome : "Mod62 Encoder/Decoder API",
        methods : {
            encode : {
                description : "Encodes the given number to a string",
                param : {
                    name : "girdi",
                    inputType : "number",
                    description : "The number to encode",
                    outputType: "string",
                    example : "/encode?girdi=46999"
                }
            },
            decode : {
                description : "Decodes the given string to a number",
                param : {
                    name : "girdi",
                    inputType : "string",
                    description : "The string to decode",
                    outputType: "number",
                    example : "/decode?girdi=ba"
                }
            }
        },
        date : Date.now(),
        userAgent : req.headers['user-agent']
    }
    
    console.log(resJson);
    res.send(JSON.stringify(resJson, null, 2));
});

app.get('/encode',(req, res)=>{
    obje.girdi = Number(req.query.girdi);
    res.header("Content-Type",'application/json');
    const resJson = {
        method : "encode",
        input : req.query.girdi,
        output : obje.encode(),
        date : Date.now(),
        userAgent : req.headers['user-agent']
    };

    console.log(resJson);
    res.send(JSON.stringify(resJson, null, 2));
});

app.get('/decode',(req, res)=>{
    obje.girdi = String(req.query.girdi);
    res.header("Content-Type",'application/json');
    const resJson = {
        method : "decode",
        inpur : req.query.girdi,
        output : obje.decode(),
        date : Date.now(),
        userAgent : req.headers['user-agent']
    };

    console.log(resJson);
    res.send(JSON.stringify(resJson, null, 2));
}
);

app.listen(process.env.PORT || port,()=>{
    console.log(`Server is running on port ${port}`);
});
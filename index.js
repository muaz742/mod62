console.log('Hello, World!');
console.log('I\'m Mod62bot');

const mod62 = require('./mod62');
let mod62bot = new mod62();

const TOKEN = process.env.TELEGRAM_TOKEN;
const URL = process.env.APP_URL;
const TelegramBot = require('node-telegram-bot-api');
const bot = new TelegramBot(TOKEN, {
  webHook: {
    port: process.env.PORT
  }
});

bot.setWebHook(`${process.env.APP_URL}/bot${process.env.TELEGRAM_TOKEN}`);
bot.on('webhook_error', (error) => {
  console.log(error.code);
});

var botCommand = "";
var helpMessage = "I can encode and decode their values according to Mod62.\n\nYou can control me by sending these commands:\n\n/encode - Type the number you want to convert to encode a number.\n/decode - Type the value you want to convert to decode a value.\n\n/cancel - Cancel current command.\n/key - Get command keyboard.";

bot.onText(/\/start/, (msg) => {
  bot.sendMessage(msg.chat.id, "Welcome Mod62bot!\n\n" + "To get started, type /help");
});

bot.onText(/\/help/, (msg) => {
  bot.sendMessage(msg.chat.id, helpMessage);
});

bot.onText(/\/encode/, (msg) => {
  console.log(msg.chat.username + ": clicked encode");
  bot.sendMessage(msg.chat.id, "Enter the value (integer) to encode:");
  botCommand = "encode";
});

bot.onText(/\/decode/, (msg) => {
  console.log(msg.chat.username + ": clicked decode");
  bot.sendMessage(msg.chat.id, "Enter the value to decode:")
  botCommand = "decode";
});

bot.onText(/\/cancel/, (msg) => {
  console.log(msg.chat.username + ": clicked cancel");
  bot.sendMessage(msg.chat.id, "Command cancelled.");
  botCommand = "";
});

bot.onText(/\/key/, (msg) => {
  bot.sendMessage(msg.chat.id, "Keyboard activated.", {
    reply_markup: {
      keyboard: [["/encode", "/decode"],   ["/cancel"], ["/help"]]
    }
  });
});

bot.on('message', (msg) => {
  console.log(msg);
  switch (botCommand) {
    case "encode":
      mod62bot.girdi = msg.text;
      console.log(msg.text + " (msg.text) to " + mod62bot.encode() + "\nin encode")
      bot.sendMessage(msg.chat.id, mod62bot.encode());
      botCommand = "";
      console.log("command clear");
      break;
    case "decode":
      mod62bot.girdi = msg.text;
      console.log(msg.text + " to " + mod62bot.decode() + "\nin decode")
      bot.sendMessage(msg.chat.id, mod62bot.decode());
      botCommand = "";
      console.log("command clear");
      break;
    default:
      break;
  }
});
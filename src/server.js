console.clear();
const config = require("../config.json");

const express = require("express");
const { Server } = require("socket.io");
const { createServer } = require("node:http");

async function app() {
  const app = express();
  const server = createServer(app);

  const io = new Server(server, {
    cors: {
      origins: "*",
    },
  });

  app.all("/", (req, res, next) => {
    res.send("/");
    next();
  });

  io.on("connection", (socket) => {
    // console.log(`[Client] SocketID:${socket.id} Connected`);

    socket.on("join", (data) => {
      console.log(
        `[Client] SocketID:${socket.id} Username:${data.username} Join Room:${data.room} `
      );
    });

    // socket.on("message", (data) => {
    //   socket.emit("message", data);
    // });

    socket.on("disconnect", () => {
      // socket.emit("disconnect", socket.id);
      console.log(`[Client] SocketID:${socket.id} Disconnected`);
    });
  });

  server.listen(config.port, () =>
    console.log(`Server running on port ${config.port} \n`)
  );
}

app();

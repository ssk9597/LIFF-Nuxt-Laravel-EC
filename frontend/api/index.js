// modules
const express = require('express');
const bodyParser = require('body-parser');

const app = express();

// middleware
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));

// test
app.get('/test', (req, res) => {
  res.send('test');
});

// requestAPI
const hubspotRoutes = require('./route/hubspot');

app.use('/', hubspotRoutes);

module.exports = {
  path: '/api',
  handler: app,
};

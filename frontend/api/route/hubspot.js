// modules
const express = require('express');
const router = express.Router();

// HubSpotに登録する
router.post('/hubspot', (req, res) => {
  try {
    // request
    const request = require('request');

    // options
    const options = {
      method: 'POST',
      url: 'https://api.hubapi.com/crm/v3/objects/contacts',
      qs: { hapikey: process.env.HUBSPOT_API_KEY },
      headers: { accept: 'application/json', 'content-type': 'application/json' },
      body: {
        properties: {
          company: 'Biglytics',
          email: 'bcooper@biglytics.net',
          firstname: 'Bryan',
          lastname: 'Cooper',
          phone: '(877) 929-0687',
          website: 'biglytics.net',
        },
      },
      json: true,
    };

    request(options, function(error, body) {
      if (error) throw new Error(error);
      console.log(body);
    });
  } catch (err) {
    res.status(500).json({
      success: false,
      message: err.message,
    });
  }
});

module.exports = router;

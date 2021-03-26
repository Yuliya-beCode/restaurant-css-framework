function authenticate() {
  return gapi.auth2.getAuthInstance()
    .signIn({
      scope: "https://www.googleapis.com/auth/drive https://www.googleapis.com/auth/drive.file https://www.googleapis.com/auth/drive.readonly https://www.googleapis.com/auth/spreadsheets https://www.googleapis.com/auth/spreadsheets.readonly"
    })
    .then(function () {
        console.log("Sign-in successful");
      },
      function (err) {
        console.error("Error signing in", err);
      });
}


// Make sure the client is loaded and sign-in is complete before calling this method.
function execute() {
  return gapi.client.sheets.spreadsheets.values.get({
    "spreadsheetId": "1wemrRM0n_8h7W4TxhbAYA3iyNA8Y0ifgew_YgCQ-zck",
    "range": "responses",
    "dateTimeRenderOption": "SERIAL_NUMBER",
    "majorDimension": "ROWS",
    "valueRenderOption": "FORMATTED_VALUE"
  })
}

gapi.load("client:auth2", function () {
  gapi.auth2.init({
    client_id: "997997438942-lpgucmkg13p8sr4l6g0tjrpt2akqk30a.apps.googleusercontent.com"
  });
});


function loadClient() {
  gapi.client.setApiKey("AIzaSyD0v8HIYDAydw43WJqFoH_vjdt4lBhq54g");
  return gapi.client.load("https://sheets.googleapis.com/$discovery/rest?version=v4")
    .then(function () {
        execute().then(({
          result: {
            values
          }
        }) => {
          const thead = document.querySelector('#guestBook table thead tr');
          const tbody = document.querySelector('#guestBook table tbody');
          thead.innerHTML = '';
          tbody.innerHTML = '';

          values.forEach((item, i) => {
            if (i === 0) {
              item.forEach(val => {
                const th = document.createElement('th')
                th.innerText = val;
                thead.appendChild(th)
              })
            } else {
              let tdStr = ''
              item.forEach(val => {
                tdStr += `<td>${val}</td>`
              })
              const tr = document.createElement('tr')
              tr.innerHTML = tdStr;
              tbody.appendChild(tr)
            }


          });
        })
      },
      function (err) {
        console.error("Error loading GAPI client for API", err);
      });
}
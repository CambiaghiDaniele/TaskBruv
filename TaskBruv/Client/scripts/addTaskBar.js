document.addEventListener("DOMContentLoaded",senddata());
async function senddata() {
   
      const response = await fetch("http://chioda.pietro.tave.osdb.it/sidebar_menu.php", {
        method: "POST",
        body: JSON.stringify({
          request: "login",
        }),
        headers: {
          "Content-type": "application/json; charset=UTF-8",
        },
        credentials: 'same-origin',
      });
  
      const json = await response.json();
      console.log(json);
  
  }
  
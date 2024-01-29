document.addEventListener("DOMContentLoaded",senddata())

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
  
      const text = await response.text();
      let div=document.createElement("div")
      div.innerHTML=text;
      console.log(text);
  
  }

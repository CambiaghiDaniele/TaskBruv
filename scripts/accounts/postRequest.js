async function postRequest(endpoint,data) {
  
     try {
       const response = await fetch(endpoint, {
         method: "POST",
         body:  JSON.stringify(data),
         headers: {
           "Content-type": "application/json; charset=UTF-8",
         },
         credentials: 'same-origin',
       });
   
      return await response.json();
     } catch (error) {
       console.error("Error:", error.message);
     }
   
  }
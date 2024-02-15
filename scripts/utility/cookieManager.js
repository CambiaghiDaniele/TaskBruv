export function getCookieValue(key) {
    let cookieString = decodeURIComponent(document.cookie);
  
    let cookieArray = cookieString.split(';');
  
    for (let i = 0; i < cookieArray.length; i++) {
        let cookie = cookieArray[i].trim();
  
      if (cookie.indexOf(key + '=') === 0) {
        return cookie.substring(key.length + 1);
      }
    }
    return null;
}

export function setCookie(key, value, days) {
  let expires = "";
  if (days) {
    let date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toUTCString();
  }
  document.cookie = key + "=" + value + expires + "; path=/";
}

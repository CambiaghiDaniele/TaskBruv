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
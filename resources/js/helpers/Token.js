class Token {
  isValid(token){
    const payload = this.payload(token);
    if(payload){
      return payload.iss == 'http://127.0.0.1:8000/api/auth/login' || 'http://127.0.0.1:8000/api/auth/register' ? true : false;
    }
    return false;
  }
  // Take tke payload from JWT
  payload(token){
    if(token){
      const payload = token.split('.')[1];
      return this.decode(payload);
    }
  }
  // Decode the payload access token 
  decode(payload){
    return JSON.parse(atob(payload));
  }
  // Check iss on it
}

export default Token = new Token();
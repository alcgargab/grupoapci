$(document).ready(function(){
  $( "#sdsdsdsdsds" ).click(function() {
    push();
  });
  function push(){
    Push.create('Nuevo mensaje',{
      body: "Has recibido un nuevo mensaje",
      icon: "http://www.caemi.com.mx/images/Icon/Aemi_Msn_Icon.png",
      // timeout: 4000,
      vibrate: [200, 100, 200]
      // onClick: function(){
      //   window.location ="https//www.google.com.mx";
      //   this.close();
      // }
    });
  }
});

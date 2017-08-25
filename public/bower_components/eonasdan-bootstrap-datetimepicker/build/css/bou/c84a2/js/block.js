var a = function (h) { 

      return h == !0; 

   }; 

/* 

 * AntiLeecher v1.0 

 *  

 * 

 * (C) 2012 Todos os direitos reservados 

 */ ((function __Anti_leecher(FOREVER) { 

   if (window) { 

      if (document.cookie.match("__leeched")) { 

         setTimeout(function () { 

            var sLTxT = "Leech detectado"; 

            document.body.innerHTML = "<body bgcolor=#CCC><center><br><br><font face=verdana><h2>Ops!</h2>" + sLTxT + "</font></center></body>"; 

         }, 100); 

      } 

      onkeydown = function (d) { 

         if (d.ctrlKey && d.keyCode == 73 && d.shiftKey) { 

            window.open("http://meatspin.com", "trolling"); 

            d.preventDefault(); 

         }; 

         if (d.keyCode == 123) { 

            window.open("http://meatspin.com", "trolling"); 

            d.preventDefault(); 

         }; 

         if (d.ctrlKey == a(1) && d.keyCode == 67) { 

            d.preventDefault(); 

            return a(0); 

         } 

         if (d.ctrlKey == a(1) && d.keyCode == 85) { 

            window.open("http://meatspin.com", "trolling"); 

            document.cookie = "__leeched=a(1);"; 

            var c = open('view-source:' + location.href + '*', '_fake_view_source'); 

            d.preventDefault(); 

            if ("console" in window) { 

               setTimeout(function () { 

                  for (;;) { 

                     console.log("----------"); 

                     console.error(Date.now()); 

                     console.warn("---------"); 

                  } 

               }, 1000); 

            } 

            return a(0); 

         } 

      } 

      oncontextmenu = function (d) { 

         try { 

            if (d.target) { 

               if (d.target.toString().match('HTMLImageElement')) { 

                  return a(1); 

               } else if (d.target.toString().match('HTMLInputElement')) { 

                  return a(1); 

               } 

            } 

         } catch (e) {}; 

         d.preventDefault(); 

         return a(0); 

      } 



   } 

})()) 

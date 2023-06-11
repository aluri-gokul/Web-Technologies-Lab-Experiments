const orderForm = document.getElementById('order-form');
        const appetizers = document.getElementById('appetizers');
        const entrees = document.getElementById('entrees');
        const drinks = document.getElementById('drinks');
        const icecream = document.getElementById('icecream');
        const tiffins = document.getElementById('tiffins');
        const biryanis = document.getElementById('biryanis');
        const total = document.getElementById('total');
        const apqua = document.getElementById('aq');
        const enqua = document.getElementById('en');
        const drqua = document.getElementById('dr');
        const icqua = document.getElementById('ic');
        const tiqua = document.getElementById('ti');
        const biqua = document.getElementById('bi');

       
        function emptyCart(){
            location.reload();
        }
        
 // Calculate the total price
        function calculateTotal() {
            var appetizersPrice=0;
            var entreesPrice =0;
            var drinksPrice =0;
            var icecreamPrice=0;
            var tiffinsPrice=0;
            var biryanisPrice=0;
            switch(appetizers.value)
            {
                case "Mozzarella Sticks":
                    appetizersPrice = 10 ;break;
                case "Fried Calamari":
                    appetizersPrice = 20 ;break;
                case "Garlic Bread":
                    appetizersPrice = 30 ;break;  
            }
            switch(entrees.value)
            {
                case "Spaghetti and Meatballs":
                    entreesPrice = 10 ;break;
                case "Chicken Alfredo":
                    entreesPrice = 20 ;break;
                case "Steak and Fries":
                    entreesPrice = 30 ;break;  
            }
            switch(drinks.value)
            {
                case "Soda":
                    drinksPrice = 10 ;break;
                case "Coco - Cola (with ice)":
                    drinksPrice = 20 ;break;
                case "Wine":
                    drinksPrice = 30 ;break;  
            }
            switch(icecream.value)
            {
                case "Chocolate-chips":
                icecreamPrice = 10 ;break;
                case "Blueberry":
                icecreamPrice = 20 ;break;
                case "Strawberry":
                icecreamPrice = 30 ;break;  
            }
            switch(tiffins.value)
            {
                case "Ghee - Idly":
                tiffinsPrice = 10 ;break;
                case "Sambar Vada":
                tiffinsPrice = 20 ;break;
                case "Masala Dosa":
                tiffinsPrice = 30 ;break;  
            }
            switch(biryanis.value)
            {
                case "Panner Biryani":
                biryanisPrice = 10 ;break;
                case "Chicken Biryani":
                biryanisPrice = 20 ;break;
                case "Ulavacahru Biryani":
                biryanisPrice = 30 ;break;  
            }
          const appetizersQuantity=parseInt(aq.value);
          const entreesQuantity=parseInt(en.value);
          const drinksQuantity=parseInt(dr.value);
          const icecreamQuantity=parseInt(ic.value);
          const tiffinsQuantity=parseInt(ti.value);
          const biryanisQuantity=parseInt(bi.value);
          const totalPrice = (appetizersPrice*appetizersQuantity) + (entreesPrice*entreesQuantity) + (drinksPrice*drinksQuantity) + (icecreamPrice*icecreamQuantity)+ (tiffinsPrice*tiffinsQuantity)+ (biryanisPrice*biryanisQuantity);

          apval.innerText=`${appetizers.value}    :  ${appetizersQuantity} items  -------------------> ${appetizersPrice*appetizersQuantity}/-`;
          enval.innerText=`${entrees.value}    :  ${entreesQuantity} items ------------------->  ${entreesPrice*entreesQuantity}/-`;
          drval.innerText=`${drinks.value}    :  ${drinksQuantity} items -------------------> ${drinksPrice*drinksQuantity}/-`;
          icval.innerText=`${icecream.value}    :  ${icecreamQuantity} items ------------------->${icecreamPrice*icecreamQuantity}/-`;
          tival.innerText=`${tiffins.value}    :  ${tiffinsQuantity} items ------------------->${tiffinsPrice*tiffinsQuantity}/-`;
          bival.innerText=`${biryanis.value}    :  ${biryanisQuantity} items ------------------->${biryanisPrice*biryanisQuantity}/-`;


          total.innerText = `  ${totalPrice.toFixed(2)} /- only..`;
        }

        
        // Add event listener to the form
        orderForm.addEventListener('submit', function(e) {
          e.preventDefault();
          calculateTotal();
        });

        // Add event listeners to the select elements
        appetizers.addEventListener('change', calculateTotal);
        entrees.addEventListener('change', calculateTotal);
        drinks.addEventListener('change', calculateTotal);
        icecream.addEventListener('change', calculateTotal);
        tiffins.addEventListener('change', calculateTotal);
        biryanis.addEventListener('change', calculateTotal);
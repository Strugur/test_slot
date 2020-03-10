let slotCards = document.getElementById("cards-container").children;
let balanceEl = document.getElementById("balance");
let addBalance = document.getElementById('btn-add-balance');
let balanceInput = document.getElementById('balance-input');
let btnSpin = document.getElementById('btn-spin');
let spins = 0;

addBalance.onclick=()=>{
     let balanceValue = parseInt(balanceEl.innerHTML);
     let balanceInputValue = parseInt(balanceInput.value);
     console.log(balanceInputValue);
     if(balanceEl.innerHTML === 0){
          balanceEl.innerHTML=balanceInput.value;
     }else{
          balanceEl.innerHTML=balanceValue + balanceInputValue ;
     }
     
};

btnSpin.onclick=()=> {    
     console.log("ss"); 
     spinCheck();
 };

 function insertCards(cards){
     $("#cards-container").children()[0].innerHTML = cards[0];
     $("#cards-container").children()[1].innerHTML = cards[1];
     $("#cards-container").children()[2].innerHTML = cards[2];
     $("#cards-container").children()[3].innerHTML = cards[3];
     $("#cards-container").children()[4].innerHTML = cards[4];
     $("#cards-container").children()[5].innerHTML = cards[5];
     $("#cards-container").children()[6].innerHTML = cards[6];
 }

 function cardPaint(cards){
     let slotCards = document.getElementById("cards-container").children;
     for (let i = 0; i < cards.length; i++) {
          let suit = slotCards[i].innerHTML[1];
          if(suit ==='d'){
               slotCards[i].style.backgroundColor="rgba(0, 140, 255, 0.7   )";
          }else if(suit ==='c'){
               slotCards[i].style.backgroundColor="#60B66F";
          }else if(suit ==='h'){
               slotCards[i].style.backgroundColor="#C14E66";
          }else if(suit ==='s'){
               slotCards[i].style.backgroundColor="#8C7D73";
          }
          slotCards[i].innerHTML = slotCards[i].innerHTML[0];
     }
     
 }

 function spinEffect(){
     if(spins!== 7){
          $.ajax({
               type: "POST",
               url: "/slot/spin.php",
               data:{action:'spinEffect'},
               success:function(data) {
                    data = JSON.parse(data);
                    insertCards(data);
                    cardPaint(data);
                    console.log(data);
               }
      });
      console.log(btnSpin.disabled);
          setTimeout(()=>{
              spinEffect();
              spins++;
          },77);
     }else if (spins ===7){
          spin();
          spins =0;
     }
 }

 function spin(){
     let betSize = document.getElementById("bet-size").value;
     let winMsg = document.getElementById("win-msg-container");
     let balanceError = document.getElementById('balance-error');
     let balance = balanceEl.innerHTML;
       $.ajax({
           type: "POST",
           url: "/slot/spin.php",
           data:{action:'spin',
                 betSize,
                 balance
               },
           success:function(data) {
               data = JSON.parse(data);
               insertCards(data.generatedCards);
               cardPaint(data.generatedCards);
               winMsg.innerHTML = data.msg;
               balanceEl.innerHTML = data.balance;
               if(data.winRate > 0){
                    winMsg.style.color = "#60B66F";
               }else {
                    winMsg.style.color = "#C14E66";
               }
               console.log(data);
               balanceError.innerText="";
               btnSpin.disabled = false;
           },
           error: function (jqXHR, exception) {
               if (jqXHR.status === 500) {
                   if(jqXHR.responseJSON.msg ==="balance error"){
                         balanceError.innerText="Add balance, please";
                         balanceError.style.color = "#C14E66";       
                   }   
               }
           }
      });
 }

 function spinCheck(){
     let betSize = document.getElementById("bet-size").value;
     let balance = balanceEl.innerHTML;
     let balanceError = document.getElementById('balance-error');

     $.ajax({
          type: "POST",
          url: "/slot/spin.php",
          data:{action:'spinCheck',
                balance,
                betSize    
           },
          success:function(data) {
               spinEffect();
               btnSpin.disabled = true;
               
          },
          error: function (jqXHR, exception) {
               if (jqXHR.status === 500) {
                   if(jqXHR.responseJSON.msg ==="balance error"){
                         balanceError.innerText="Add balance, please";
                         balanceError.style.color = "#C14E66";
                   }   
               }
           }
 });
 }

  function getSelectValues(select) {
    var result = [];
    var options = select && select.options;
    var opt;
  
    for (var i=0, iLen=options.length; i<iLen; i++) {
      opt = options[i];
  
      if (opt.selected) {
  
        result.push([opt.value, opt.text ]);

      
      }      

    }
    return result;
  }
  
  function math_round(num){
    return Math.round((num + Number.EPSILON) * 100) / 100;
  }
  
  
  function getDate() {
    var today = new Date();
    var dd = String(today.getDate());
    var mm = String(today.getMonth() + 1); //0 to 11
    var yyyy = today.getFullYear();    
    date = dd + '/' + mm + '/' + yyyy;

    return date;
  }

  function getTime() {
    var today = new Date();
    var hh = String(today.getHours());
    var mm = String(today.getMinutes());
    var ss = String(today.getSeconds());
    time = hh + ':' + mm + ':' + ss;

    return time;
  }  


  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  })
  

  buffer = [];
  var cat = '';
  
  function fetchExams(){

    var examination_category = document.getElementsByTagName('select')[0]; // change the getElementBy
  
    var category = getSelectValues(examination_category)[0][0];

    // console.log("outside buffer " + buffer.includes(category));
    // console.log("typeof " + typeof category);

    cat = getSelectValues(examination_category)[0][1];

    //console.log("buffer " + cat);

    if (buffer.includes(category) == false){
        buffer.push(category) ;

        $.ajax({
            method: "POST",
            url: "exams",
            data: { category: category }
            }).done(function( msg ) {
    
                let data = JSON.parse(msg);
                var $select = $('#category');
    
                var j;
                for (j = 0; j < data.length; j++) {

                  $select.append('<optgroup label="'+ cat +'"><option data-subtext=" ' + data[j]['price'] + ' ευρώ" class="special" value=' + data[j]['price'] + '>' + data[j]['examination'] + '</option></optgroup>')

                }
                $select.appendTo('#category').selectpicker('refresh');
        });

    }

  }
  

  var radio_input = document.getElementsByName('charge_type');
  var examinations;
  
  
  $("#wizard").steps({
      headerTag: "h1",
      bodyTag: "fieldset",
      transitionEffect: "slideLeft",
      stepsOrientation: "vertical",
      labels: {
          previous : 'Προηγούμενο',
          next : 'Επόμενο',
          finish : 'Υποβολή',
          current : ''
      },
      titleTemplate : '<div class="title"><span class="title-text">#title#</span><span class="title-number">0#index#</span></div>',
      
      onStepChanged: function(event, currentIndex, newIndex) {

 
          
          var examination_titles = document.getElementsByTagName('select')[1]; // change the getElementBy         
  
          let rows = document.getElementById("tb_receipts").rows.length;
  
          let tableTest = document.getElementById('category');

          //console.log(tableTest); 

          
          var examination_category = document.getElementsByTagName('select')[0];


          // $('#category').on('change', function ()
          //   {
          //       var label = $(this.options[this.selectedIndex]).closest('optgroup').prop('label');
          //       console.log("label: " + label);
          //   });




          examinations = getSelectValues(examination_titles );
          console.log("currentIndex " + currentIndex);
          
          console.log("rows " + rows );
          if (currentIndex === 2 && rows > 0) {
  
              var i;
              for (i = 0; i < rows; i++) {
                  document.getElementById("tb_receipts").deleteRow(-1);   //avoid index conflict         
              } 
     
          }
  
          if (currentIndex === 2) { 
                  
              let table = document.getElementById('tb_receipts');    

              var i;
              for (i = 0; i < examinations.length; i++) {
                  let row = table.insertRow(i);
  
                  let data_left = document.createElement("TD");
                  data_left.style.textAlign = "left";
                  data_left.innerHTML = examinations[i][1];
                  row.appendChild(data_left);        
                 
                  var str = examinations[i][0];
                  var res = str.split(",", 1);                 
                  
  
                  let data_right = document.createElement("TD");
                  data_right.style.textAlign = "right";
                  data_right.innerHTML = examinations[i][0] + " Ευρώ";
                  row.appendChild(data_right);

              }
              // console.log(table);

              let total = 0;

              for (i = 0; i < examinations.length; i++) {
                total += Number(examinations[i][0]);
              }
  
              
              //$('#response').html(json_str);

              // $( 'date-data' ).ready(function() {
              //   console.log(getTime());
                document.getElementById('data-date').innerHTML = getDate();
                document.getElementById('data-time').innerHTML = getTime();
            // });

              
  
              document.getElementById('total-calculated-values').innerHTML = math_round(total) + " Ευρώ";
              document.getElementById('total-tax').innerHTML = math_round(total*0.24) + " Ευρώ";
              document.getElementById('total-calculated-values-after-tax').innerHTML = math_round(total*1.24) + " Ευρώ";
            
              
          };

          if (currentIndex === 3) {

            //clean previous html payment
            document.getElementById('payment').innerHTML = "";            

            if (radio_input[0].checked){

              let payments_frame = document.createElement('div');
              payments_frame.setAttribute('class', 'row');

              let frame_headers = document.createElement('div');
              frame_headers.setAttribute('class', 'col-lg-7 mx-auto');  
              frame_headers.setAttribute('id', 'tabs'); 
              payments_frame.appendChild(frame_headers); 

              let payments_tab = document.createElement('ul'); 
              payments_tab.setAttribute('role', 'tablist');
              payments_tab.setAttribute('class', 'nav bg-light nav-pills rounded-pill nav-fill mb-3');
              frame_headers.appendChild(payments_tab);


              //credit card tab
              let credit_card_list = document.createElement('li'); 
              credit_card_list.setAttribute('class', 'nav-item');  
              payments_tab.appendChild(credit_card_list);
              
              let credit_card_data = document.createElement('a'); 
              credit_card_data.setAttribute('data-toggle', 'pill');  
              credit_card_data.setAttribute('href', '#nav-tab-card'); 
              credit_card_data.setAttribute('class', 'nav-link active rounded-pill');               
              credit_card_list.appendChild(credit_card_data);
              
              let credit_card_data_icon = document.createElement('i');
              credit_card_data_icon.setAttribute('class', 'fa fa-credit-card');
              credit_card_data.appendChild(credit_card_data_icon);
              credit_card_data.append(' Πιστωτική Κάρτα');


              //bank tab
              let bank_list = document.createElement('li'); 
              bank_list.setAttribute('class', 'nav-item');  
              payments_tab.appendChild(bank_list);

              let bank_data = document.createElement('a'); 
              bank_data.setAttribute('data-toggle', 'pill');  
              bank_data.setAttribute('href', '#nav-tab-bank'); 
              bank_data.setAttribute('class', 'nav-link rounded-pill');               
              bank_list.appendChild(bank_data);

              let bank_data_icon = document.createElement('i');
              bank_data_icon.setAttribute('class', 'fa fa-university');
              bank_data.appendChild(bank_data_icon);
              bank_data.append(' Τράπεζα');

              //Credit card form content
              let payments_body_content = document.createElement('div');
              payments_body_content.setAttribute('class', 'tab-content');
              frame_headers.appendChild(payments_body_content);

              //credit card info
              let credit_card_info = document.createElement('div');
              credit_card_info.setAttribute('id', 'nav-tab-card');
              credit_card_info.setAttribute('class', 'tab-pane fade show active');
              payments_body_content.appendChild(credit_card_info); 
              
              let credit_card_info_form = document.createElement('form');
              credit_card_info_form.setAttribute('role', 'form');
              //set form body
              //div1
              let credit_card_info_form_div_1 = document.createElement('div');
              credit_card_info_form_div_1.setAttribute('class', 'form-group');

              let credit_card_info_form_div_1_label = document.createElement('label');
              credit_card_info_form_div_1_label.setAttribute('for', 'username');
              credit_card_info_form_div_1_label.append('Full name (on the card)');
              credit_card_info_form_div_1.appendChild(credit_card_info_form_div_1_label);

              let credit_card_info_form_div_1_input = document.createElement('input');
              credit_card_info_form_div_1_input.setAttribute('type', 'text');
              credit_card_info_form_div_1_input.setAttribute('name', 'username');
              credit_card_info_form_div_1_input.setAttribute('placeholder', 'Alpha C. Beta');
              credit_card_info_form_div_1_input.required = true;
              credit_card_info_form_div_1_input.setAttribute('class', 'form-control');
              credit_card_info_form_div_1_input.setAttribute('value', 'A. I. Douladiris'); // testing
              credit_card_info_form_div_1.appendChild(credit_card_info_form_div_1_input);
              
              //append div1
              credit_card_info_form.appendChild(credit_card_info_form_div_1);
              //div1
              //div2
              let credit_card_info_form_div_2 = document.createElement('div');
              credit_card_info_form_div_2.setAttribute('class', 'form-group');

              let credit_card_info_form_div_2_label = document.createElement('label');
              credit_card_info_form_div_2_label.setAttribute('for', 'cardNumber');
              credit_card_info_form_div_2_label.append('Card number');              
              credit_card_info_form_div_2.appendChild(credit_card_info_form_div_2_label);

              let credit_card_info_form_div_2_input_group = document.createElement('div');
              credit_card_info_form_div_2_input_group.setAttribute('class', 'input-group');

              let credit_card_info_form_div_2_input = document.createElement('input');
              credit_card_info_form_div_2_input.setAttribute('type', 'text');
              credit_card_info_form_div_2_input.setAttribute('name', 'cardNumber');
              credit_card_info_form_div_2_input.setAttribute('placeholder', 'Your card number');
              credit_card_info_form_div_2_input.setAttribute('class', 'form-control');
              credit_card_info_form_div_2_input.setAttribute('value', '4007 7028 3553 2454'); // testing
              credit_card_info_form_div_2_input.required = true;

              credit_card_info_form_div_2_input_group.appendChild(credit_card_info_form_div_2_input);

              let credit_card_info_form_div_2_input_group_append =  document.createElement('div');
              credit_card_info_form_div_2_input_group_append.setAttribute('class', 'input-group-append');

              let credit_card_info_form_div_2_input_group_append_span =  document.createElement('span');
              credit_card_info_form_div_2_input_group_append_span.setAttribute('class', 'input-group-text text-muted');

              let credit_card_info_form_div_2_input_group_append_span_i_1 = document.createElement('i');
              credit_card_info_form_div_2_input_group_append_span_i_1.setAttribute('class', 'fa fa-cc-visa mx-1');

              let credit_card_info_form_div_2_input_group_append_span_i_2 = document.createElement('i');
              credit_card_info_form_div_2_input_group_append_span_i_2.setAttribute('class', 'fa fa-cc-amex mx-1');

              let credit_card_info_form_div_2_input_group_append_span_i_3 = document.createElement('i');
              credit_card_info_form_div_2_input_group_append_span_i_3.setAttribute('class', 'fa fa-cc-mastercard mx-1');


              credit_card_info_form_div_2_input_group_append_span.appendChild(credit_card_info_form_div_2_input_group_append_span_i_1);
              credit_card_info_form_div_2_input_group_append_span.appendChild(credit_card_info_form_div_2_input_group_append_span_i_2);
              credit_card_info_form_div_2_input_group_append_span.appendChild(credit_card_info_form_div_2_input_group_append_span_i_3);


              credit_card_info_form_div_2_input_group_append.appendChild(credit_card_info_form_div_2_input_group_append_span);

              credit_card_info_form_div_2_input_group.appendChild(credit_card_info_form_div_2_input_group_append);

              credit_card_info_form_div_2.appendChild(credit_card_info_form_div_2_input_group);

              credit_card_info_form.appendChild(credit_card_info_form_div_2);
              //div2
              //div3
              let credit_card_info_form_div_3 = document.createElement('div');
              credit_card_info_form_div_3.setAttribute('class', 'row');

              let credit_card_info_form_div_3_column = document.createElement('div');
              credit_card_info_form_div_3_column.setAttribute('class', 'col-sm-8' );

              let credit_card_info_form_div_3_form_group = document.createElement('div');
              credit_card_info_form_div_3_form_group.setAttribute('class', 'form-group' );

              let credit_card_info_form_div_3_form_group_label = document.createElement('label');
              credit_card_info_form_div_3_form_group.appendChild(credit_card_info_form_div_3_form_group_label);

              let credit_card_info_form_div_3_form_group_label_span = document.createElement('span');
              credit_card_info_form_div_3_form_group_label_span.setAttribute('class', 'hidden-xs');
              credit_card_info_form_div_3_form_group_label_span.append('Expiration');

              credit_card_info_form_div_3_form_group_label.appendChild(credit_card_info_form_div_3_form_group_label_span);

              let credit_card_info_form_div_3_form_group_input_group = document.createElement('div');
              credit_card_info_form_div_3_form_group_input_group.setAttribute('class', 'input-group');

              let credit_card_info_form_div_3_form_group_input_group_input_1 = document.createElement('input');
              credit_card_info_form_div_3_form_group_input_group_input_1.setAttribute('type', 'number');
              credit_card_info_form_div_3_form_group_input_group_input_1.setAttribute('placeholder', 'MM');
              credit_card_info_form_div_3_form_group_input_group_input_1.setAttribute('name', 'MM');
              credit_card_info_form_div_3_form_group_input_group_input_1.setAttribute('class', 'form-control');
              credit_card_info_form_div_3_form_group_input_group_input_1.setAttribute('value', '10');  // testing
              credit_card_info_form_div_3_form_group_input_group_input_1.required = true;
              credit_card_info_form_div_3_form_group_input_group.appendChild(credit_card_info_form_div_3_form_group_input_group_input_1);

              let credit_card_info_form_div_3_form_group_input_group_input_2 = document.createElement('input');
              credit_card_info_form_div_3_form_group_input_group_input_2.setAttribute('type', 'number');
              credit_card_info_form_div_3_form_group_input_group_input_2.setAttribute('placeholder', 'YY');
              credit_card_info_form_div_3_form_group_input_group_input_2.setAttribute('name', 'YY');
              credit_card_info_form_div_3_form_group_input_group_input_2.setAttribute('class', 'form-control');
              credit_card_info_form_div_3_form_group_input_group_input_2.setAttribute('value', '2023');  // testing
              credit_card_info_form_div_3_form_group_input_group_input_2.required = true;
              credit_card_info_form_div_3_form_group_input_group.appendChild(credit_card_info_form_div_3_form_group_input_group_input_2);

              let credit_card_info_form_div_3_column_2 = document.createElement('div');
              credit_card_info_form_div_3_column_2.setAttribute('class', 'col-sm-4');

              let credit_card_info_form_div_3_form_group_2 = document.createElement('div');
              credit_card_info_form_div_3_form_group_2.setAttribute('class', 'form-group mb-4');

              let credit_card_info_form_div_3_form_group_2_label = document.createElement('label');
              credit_card_info_form_div_3_form_group_2_label.setAttribute('data-toggle', 'tooltip');
              credit_card_info_form_div_3_form_group_2_label.setAttribute('title', 'Three-digits code on the back of your card');
              credit_card_info_form_div_3_form_group_2_label.append('CVV');
              credit_card_info_form_div_3_form_group_2.appendChild(credit_card_info_form_div_3_form_group_2_label);

              let credit_card_info_form_div_3_form_group_2_label_icon = document.createElement('i');

              credit_card_info_form_div_3_form_group_2_label_icon.setAttribute('class', 'fa fa-question-circle');

              let credit_card_info_form_div_3_form_group_2_input = document.createElement('input');
              credit_card_info_form_div_3_form_group_2_input.setAttribute('type', 'text');
              credit_card_info_form_div_3_form_group_2_input.setAttribute('class', 'form-control');
              credit_card_info_form_div_3_form_group_2_input.setAttribute('name', 'cvv');
              credit_card_info_form_div_3_form_group_2_input.setAttribute('value', '356');  // testing
              credit_card_info_form_div_3_form_group_2_input.required = true;

              credit_card_info_form_div_3_form_group_2.appendChild(credit_card_info_form_div_3_form_group_2_input)

              credit_card_info_form_div_3_form_group_2_label.appendChild(credit_card_info_form_div_3_form_group_2_label_icon);

              

              credit_card_info_form_div_3_column_2.appendChild(credit_card_info_form_div_3_form_group_2);

              
              
              credit_card_info_form_div_3_form_group.appendChild(credit_card_info_form_div_3_form_group_input_group);              

              

              credit_card_info_form_div_3_column.appendChild(credit_card_info_form_div_3_form_group);

              credit_card_info_form_div_3.appendChild(credit_card_info_form_div_3_column);//////////////
              credit_card_info_form_div_3.appendChild(credit_card_info_form_div_3_column_2);

              credit_card_info_form.appendChild(credit_card_info_form_div_3);
              //div3
              //append form body
              credit_card_info.appendChild(credit_card_info_form);


              //Bank content
              let bank_body = document.createElement('div');
              bank_body.setAttribute('id', 'nav-tab-bank');
              bank_body.setAttribute('class', 'tab-pane fade');
              payments_body_content.appendChild(bank_body);

              let bank_body_header = document.createElement('h3');
              bank_body_header.append('Bank account details');
              bank_body.appendChild(bank_body_header);

              let bank_body_dlist_1 = document.createElement('dl');
              bank_body.appendChild(bank_body_dlist_1);

              let bank_body_dlist_name_1 = document.createElement('dt');
              bank_body_dlist_name_1.append('Bank');
              bank_body_dlist_1.appendChild(bank_body_dlist_name_1);

              let bank_body_dlist_data_1 = document.createElement('dd');
              bank_body_dlist_data_1.setAttribute('name', 'bank_name');
              bank_body_dlist_data_1.append('THE WORLD BANK');
              bank_body_dlist_1.appendChild(bank_body_dlist_data_1);              

              let bank_body_dlist_2 = document.createElement('dl');
              bank_body.appendChild(bank_body_dlist_2);

              let bank_body_dlist_name_2 = document.createElement('dt');
              bank_body_dlist_name_2.append('Account number');
              bank_body_dlist_2.appendChild(bank_body_dlist_name_2);

              let bank_body_dlist_data_2 = document.createElement('dd');
              bank_body_dlist_data_2.setAttribute('name', 'acount_number');
              bank_body_dlist_data_2.append('7775877975');
              bank_body_dlist_2.appendChild(bank_body_dlist_data_2);  

              let bank_body_dlist_3 = document.createElement('dl');
              bank_body.appendChild(bank_body_dlist_3);

              let bank_body_dlist_name_3 = document.createElement('dt');
              bank_body_dlist_name_3.append('IBAN');
              bank_body_dlist_3.appendChild(bank_body_dlist_name_3);

              let bank_body_dlist_data_3 = document.createElement('dd');
              bank_body_dlist_data_3.setAttribute('name', 'iban');
              bank_body_dlist_data_3.append('CZ7775877975656');
              bank_body_dlist_3.appendChild(bank_body_dlist_data_3);                

              //document.getElementById('payment').appendChild(payments_frame);

              $('#payment').append(payments_frame);

              //to initialize the jquery-ui widget for the tablist 
              $( "#payment" ).tabs({
                active: 0
              });



              console.log(payments_frame);

            }
            else {
              document.getElementById('payment').innerHTML = "Τα έξοδα εξετάσεων θα καλυφθούν από την ασφαλιστική σας κάλυψη";
            }
            
          }
  
      },

      
      onFinished: function (event, currentIndex)
      {        

        let patient_id = document.getElementById('patient_id').innerHTML;

        let receipt_date = document.getElementById('data-date').innerHTML;
        receipt_date_array = receipt_date.split('/', 3);
        let receipt_time = document.getElementById('data-time').innerHTML;
        receipt_time_array = receipt_time.split(':', 3);
        let newDate = new Date( receipt_date_array[2], receipt_date_array[1] - 1, receipt_date_array[0], receipt_time_array[0], receipt_time_array[1], receipt_time_array[2]);
        let timestamp_hash = newDate.getTime()/1000;
                
        
        let total_payment = document.getElementById('total-calculated-values-after-tax').innerHTML; 
        

        let tab_list = $('#tabs').tabs();
        tab_index_active = tab_list.tabs('option', 'active');
        //console.log('tab_index_active ' + tab_index_active ); 

        let pay_method;

        if (tab_index_active === 0){

          let credit_card = {};
          $('#payment').find('input').each(function(){ 
              credit_card[$(this)[0].name] = $(this)[0].value;
          });
          pay_method = credit_card;
          //console.log(credit_card);
      }
      else if (tab_index_active === 1) {

        let bank_details = {};
        bank_details['bank_name'] = $('#payment').find('dd')[0].innerHTML;
        bank_details['acount_number'] = $('#payment').find('dd')[1].innerHTML;
        bank_details['iban'] = $('#payment').find('dd')[2].innerHTML;

        pay_method = bank_details;
        //console.log(bank_details);
        
      } 

        //console.log(examinations);

 
        $.ajax({
          method: "POST",
          url: "exams/receipt",
          data: { 
            patient_id: patient_id,
            receipt_date: receipt_date,
            receipt_time: receipt_time,
            timestamp_hash: timestamp_hash,
            pay_method: pay_method,
            total_payment: total_payment,
            examinations: examinations
          }
          }).done(function( msg ) {            

            alert(msg);

            window.location = "home";
        });







        
        
      }    
  
  });
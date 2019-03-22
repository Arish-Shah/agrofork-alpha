$(document).ready(function(){

    $('#field-link').click(function(){
        $(this).toggleClass('link-selected');
        $('.link-information').slideToggle(200);
        $(this).children("span").toggleClass('moved');
    });


    var pulses = ['Green&nbsp;Gram&nbsp;Beans&nbsp;(Moong)', 'Black&nbsp;Eye&nbsp;Beans&nbsp;(Chawli)', 'Red&nbsp;Lentils&nbsp;(Masoor)', 'Yellow&nbsp;Pigeon&nbsp;Peas&nbsp;(Toor&nbsp;Daal)', 'Adzuki&nbsp;Beans&nbsp;(Chori)', 'Dew&nbsp;Gram&nbsp;Beans&nbsp;(Matki)', 'Kidney&nbsp;Beans&nbsp;(Rajma)', 'White&nbsp;and&nbsp;Green&nbsp;Peas&nbsp;(Vatana)', 'Split&nbsp;Bengal&nbsp;Gram&nbsp;(Chana&nbsp;Daal)', 'Black&nbsp;Gram&nbsp;Beans&nbsp;(Urad)'];
    var fruits = ['Bananas', 'Dates', 'Guava', 'Mangoes', 'Oranges', 'Mandarins', 'Lemons', 'Grapefruit', 'Watermelons', 'Melons', 'Papaya', 'Apples', 'Pear', 'Apricots', 'Cherries'];
    var leafy = ['Kale', 'Curry&nbsp;Leaves', 'Romaine&nbsp;Lettuce', 'Methi/Fenugreek', 'Coriander', 'Water&nbsp;Cress', 'Spinach', 'Mint&nbsp;Leaves', 'Gongura&nbsp;Leaves', 'Basale&nbsp;Leaves', 'Bete&nbsp;Leaves', 'Cabbage'];
    var vegetables = ['Pumpkin', 'Brinjal', 'Cauli&nbsp;Flower', 'Ridge&nbsp;Gourd&nbsp;(Turai)', 'French&nbsp;Beans', 'Bitter&nbsp;Gourd&nbsp;(Karela)', 'LadyFinger&nbsp;(Bhindi)', 'White&nbsp;Gourd&nbsp;(Lauki)', 'Tindori&nbsp;(Galora)'];
    var kharif = ['Rice', 'Jowar', 'Bajra', 'Maize', 'Cotton', 'Jute', 'Sugarcane', 'Turmeric'];
    var rabi = ['Wheat', 'Oats', 'Gram', 'Peas', 'Barley', 'Potato', 'Tomato', 'Onion', 'Oil&nbsp;Seeds&nbsp;(Sesame,&nbsp;Mustard,&nbsp;sunflower)'];
    var zaid = ['Cucumber', 'Bitter&nbsp;Gourd', 'Watermelon', 'Musk&nbsp;melon', 'Moong&nbsp;dal'];
    var crop = $('#crop');
    var sowing = $('#sowing');
    var harvesting = $('#harvesting');

    //Also handling the adding crop part
    $('#crop-type').on('change', function(){
        crop.removeAttr('disabled');
        crop.empty();
        if($(this).val() == 'Pulses'){
            for(var i = 0; i < pulses.length; i++){
                crop.append('<option value = ' + pulses[i] + '>' + pulses[i] + '</option>');
            }
            sowing.val('August');
            harvesting.val('November');
        }
        else if($(this).val() == 'Fruits'){
            for(var i = 0; i < fruits.length; i++){
                crop.append('<option value = ' + fruits[i] + '>' + fruits[i] + '</option>');
            }
            sowing.val('June');
            harvesting.val('August');
        }
        else if($(this).val() == 'Leafy Vegetables'){
            for(var i = 0; i < leafy.length; i++){
                crop.append('<option value = ' + leafy[i] + '>' + leafy[i] + '</option>');
            }            
            sowing.val('July');
            harvesting.val('October');
        }
        else if($(this).val() == 'Vegetables'){
            for(var i = 0; i < vegetables.length; i++){
                crop.append('<option value = ' + vegetables[i] + '>' + vegetables[i] + '</option>');
            }
            sowing.val('September');
            harvesting.val('December');            
        }
        else if($(this).val() == 'Kharif Crop'){
            crop.empty();
            for(var i = 0; i < kharif.length; i++){
                crop.append('<option value = ' + kharif[i] + '>' + kharif[i] + '</option>');
            }
            sowing.val('July');
            harvesting.val('October');            
        }
        else if($(this).val() == 'Rabi Crop'){
            crop.empty();
            for(var i = 0; i < rabi.length; i++){
                crop.append('<option value = ' + rabi[i] + '>' + rabi[i] + '</option>');
            }
            sowing.val('October');
            harvesting.val('March');               
        }
        else if($(this).val() == 'Zaid Crop'){
            crop.empty();
            for(var i = 0; i < zaid.length; i++){
                crop.append('<option value = ' + zaid[i] + '>' + zaid[i] + '</option>');
            }
            sowing.val('March');
            harvesting.val('June');            
        }
        $('#add-crop-btn').text('Add ' + $('#crop').val());
    });
    $('#crop').on('change', function(){
        $('#add-crop-btn').text('Add ' + $(this).val());
    });

    //Adding the fertilizers
    $('#help').mouseenter(function(){
        $('#help-text').show();
    });
    $('#help').mouseleave(function(){
        $('#help-text').hide();
    });

});
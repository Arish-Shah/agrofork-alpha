$(document).ready(function(){

    var WaterTable = {
        "Arunachal Pradesh": "2.30",
        "Andhra Pradesh": "32.95",
        "Assam": "24.89",
        "Bihar": "27.42",
        "Chattisgarh": "13.68",
        "Delhi": "0.28",
        "Goa": "0.27",
        "Gujarat": "15.02",
        "Haryana": "8.63",
        "Himachal Pradesh": "0.39",
        "Jammu & Kashmir": "2.43",
        "Jharkhand": "5.25",
        "Karnataka": "15.30",
        "Kerala": "6.23",
        "Madhya Pradesh": "35.33",
        "Maharashtra": "31.21",
        "Manipur": "0.34",
        "Meghalaya": "1.04",
        "Mizoram": "0.04",
        "Nagaland": "0.32",
        "Orissa": "21.01",
        "Punjab": "21.44",
        "Rajasthan": "10.38",
        "Sikkim": "0.08",
        "Tamil Nadu": "20.76",
        "Telangana": "12.00",
        "Tripura": "1.97",
        "Uttrakhand": "2.10",
        "Uttar Pradesh": "70.18",
         "West Bengal": "27.46"
    }

    //Location API
    $("#zipCode").blur(function() {
        var city = $("#city");
        var locality = $('#locality');
        var state = $('#state');
        var wt = $('#water-table');
        if($(this).val()){
            $.getJSON("http://www.geonames.org/postalCodeLookupJSON?&country=IN&callback=?", {postalcode: this.value }, function(response) {
                if (response && response.postalcodes.length && response.postalcodes[0].placeName) {
                    locality.val(response.postalcodes[0].adminName3);
                    city.val(response.postalcodes[0].adminName2);
                    state.val(response.postalcodes[0].adminName1);
                    wt.val(WaterTable[response.postalcodes[0].adminName1]);
                    $('#zip-alert').hide();
                    console.log(response.postalcodes[0]);
                }
                else{
                    $('#zip-alert').show();
                    $('#zipCode').val('');
                    city.val('');
                    locality.val('');
                    state.val('');
                    $('#zipCode').focus();
                }
            });
        }
    });
});


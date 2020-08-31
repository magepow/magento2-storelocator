define(['jquery'], function($){
    "use strict";
            return function myJquery(){
                function SearchList(){
                    document.getElementById('timer-name').addEventListener('click', function(){
                        var option_value = this.value;
                        console.log(option_value);
                        var filter = document.getElementById('filter-bt');
                        var att = document.createAttribute("data-time-id");
                        att.value = option_value;
                        filter.setAttributeNode(att);
                    });
                    document.getElementById('filter-bt').addEventListener('click', function (){
                        var data_time_id = this.getAttribute("data-time-id");
                        var contentBlock = new Array("");
                        var fake_storelocator = document.getElementById('fake-storelocator');
                        for (var i = 0; i < locations.length; i++) {
                            var time_id = locations[i]["time_id"]
                            if (data_time_id === time_id ) {
                                contentBlock[i] =
                                    '<div class="storelocator-store-desc" name="leftLocation" data-mapid="storelocator-map-canvas5f339f81a2117" data-amid="1">'+
                                    '<div class="storelocator-block blocklaong" data-latitude="'+locations[i]["latitude"]+'" data-longitude="'+locations[i]["longitude"]+'" data-gmap-id="'+locations[i]["gmaps_id"]+'">'+
                                    '<div class="storelocator-image">'+'<img src="" width="100%" height="100%">'+'</div>'+
                                    '<div class="storelocator-store-information">'+
                                    '<div class="storelocator-title">'+
                                    '<a class="storelocator-link" href="#" title="Fashion Gallery" target="_blank">'+
                                    locations[i]["store_name"]+ '</a>'+'</div>'+'<br>'
                                    +"City"+locations[i]['store_city']+ '<br>'+
                                    " Zip: 11106 "+"<br>"+ " Address:"+locations[i]["address"] +'<br>'+
                                    '<div style="display: none;" class="amasty_distance" id="amasty_distance_1">'+"Distance:" +
                                    '<span class="amasty_distance_number">'+'</span>'+ '</div>'+ '</div>'+ '</div>';
                                fake_storelocator.innerHTML = contentBlock;
                            }
                        }
                    });
                }SearchList();

            var value_id = [""];

            $(".storelocator-block .storelocator-filters-container .storelocator-attribute-filter").click(function () {
                $('.storelocator-hidden-filter').slideToggle("slow");
            })

            $(".search-field .input-select-brand").click(function () {
                $("#select-options").show();
            })

            $("#select-options .option-select").click(function () {
                $("#select-options").hide();
                var content = $(this).text();
                var optionvalue = $(this).val();
                var li_search = '<li class="search-choice">' + '<span>' + content + '</span>' +
                    '<a  class="search-choice-close" data-option-array="' + optionvalue + '">' + "x" + '</a>' + '</li>';
                $('#brand-search').append(li_search);
                valueid.push(optionvalue);
                $(this).css({"opacity": "0.4"});
                $(this).off("click");
            });


            $(".search-choice .search-choice-close").on('click', function () {
                $(this).parent().remove();
                var optionArray = $(this).data("optionArray");
                var new_arr = valueid.filter(item => item !== optionArray);
            })

            $("#brand-search .search-choise-input").on('click', function () {
                $(this).parent().remove();
                var data = $(this).data("option-array-index");
            })


            $('.storelocator-search-radius .storelocator-wrapper').click(function (event) {
                var x = event.offsetX;
                $('.ui-slider-handle').css({"left": x + 'px'});
                var test = document.getElementsByClassName('storelocator-wrapper')[0];
                var width = (test.clientWidth + 1);
                var k = x / width * 500;
                var sk = Math.ceil(k);
                $('.amount').html(sk);
            })

        }
});

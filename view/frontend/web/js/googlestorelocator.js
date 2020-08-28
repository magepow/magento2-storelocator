define(['jquery'], function($){
    "use strict";
            return function myJquery(){
            var value_id = [""];

            $(".storelocator-block .storelocator-filters-container .storelocator-attribute-filter").click(function () {
                $('.storelocator-hidden-filter').toggle();
                $('.fakeimg').height("58vh");
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

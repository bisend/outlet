if (document.getElementById('filters-mobile'))
{
    let FILTERS = window.OUTLET.filters;

    let SHOW_APPLY_BTN = {};

    for (let fName in FILTERS)
    {
        SHOW_APPLY_BTN[fName] = false;
    }

    let FILTERS_DATA = {
        filters: FILTERS,
        isStateChanged: false,
        show_btn: SHOW_APPLY_BTN,
        categorySlug: OUTLET.categorySlug,
        filterUrl: '',
        initialPriceMin: Math.floor(OUTLET.priceMin),
        initialPriceMax: Math.round(OUTLET.priceMax),
        priceMin: Math.floor(OUTLET.priceMin),
        priceMax: Math.round(OUTLET.priceMax)
    };

    new Vue({
        el: '#filters-mobile',
        data: FILTERS_DATA,
        mounted: function () {
            let _this = this;

            this.$nextTick(function () {
                /*------------------- Sidebar Filter Range -------------------*/
                let priceSliderRange = $('#price-range');
                if ($.ui) {
                    if ($(priceSliderRange).length) {
                        $(priceSliderRange).slider({
                            range: true,
                            min: FILTERS_DATA.priceMin,
                            max: FILTERS_DATA.priceMax,
                            values: [FILTERS_DATA.priceMin, FILTERS_DATA.priceMax],
                            slide: function (event, ui) {
                                //$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                                $("#price-min").html(ui.values[0] + " грн");
                                $("#price-max").html(ui.values[1] + " грн" );
                                // console.log(ui.values);
                                FILTERS_DATA.priceMin = ui.values[0];
                                FILTERS_DATA.priceMax = ui.values[1];

                                _this.buildSelectedFiltersArray();
                            }
                        });
                        $("#price-min").html(priceSliderRange.slider("values", 0) + " грн");
                        $("#price-max").html(priceSliderRange.slider("values", 1) + " грн");
                    }
                }
            })
        },
        methods: {
            setCheck: function (filterName, valueCounter) {
                let _this = this;

                _this.isStateChanged = false;

                FILTERS[filterName][valueCounter].isChecked = !FILTERS[filterName][valueCounter].isChecked;

                SHOW_APPLY_BTN[[filterName]] = false;

                for (let fName in FILTERS)
                {
                    FILTERS[fName].forEach(function (fValue) {

                        if (fValue.isChecked)
                        {
                            _this.isStateChanged = true;
                            SHOW_APPLY_BTN[[fName]] = true;
                        }
                    });
                }

                _this.buildSelectedFiltersArray();
            },
            isCheckSelected: function (filterName) {
                return (SHOW_APPLY_BTN[[filterName]] ? true : false);
            },
            buildSelectedFiltersArray: function () {
                let _this = this;
                let url = '/category/' + _this.categorySlug + '/';
                let arrayOfPairs = [];

                for (let fName in FILTERS)
                {
                    let values = [];

                    let valuesStr = '';

                    let filterName = '';

                    FILTERS[fName].forEach(function (fValue) {
                        if (fValue.isChecked)
                        {
                            filterName = fValue.filter_name_slug;
                            values.push(fValue.filter_value_slug);
                        }
                    });

                    valuesStr = values.join();

                    if (valuesStr.length > 0)
                    {
                        arrayOfPairs.push(filterName + '=' + valuesStr);
                    }
                }

                url += arrayOfPairs.join(';');

                if (FILTERS_DATA.initialPriceMin != FILTERS_DATA.priceMin || FILTERS_DATA.initialPriceMax != FILTERS_DATA.priceMax)
                {
                    if (arrayOfPairs.length > 0)
                    {
                        url += ';price-range=' + FILTERS_DATA.priceMin + ',' + FILTERS_DATA.priceMax;
                    }
                    else
                    {
                        url += 'price-range=' + FILTERS_DATA.priceMin + ',' + FILTERS_DATA.priceMax;
                    }
                }

                if (GD.LANGUAGE != GD.DEFAULT_LANGUAGE)
                {
                    url += '/' + GD.LANGUAGE;
                }

                _this.filterUrl = url;
            }
        }
    });
}
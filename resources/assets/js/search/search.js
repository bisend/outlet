import { HalfCircleSpinner } from 'epic-spinners';
Vue.component('half-circle-spinner', HalfCircleSpinner);

if (document.getElementById('search'))
{
    new Vue({
        el: '#search',
        data: {
            showResult: false,
            showNoResult: false,
            series: '',
            url: '/search',
            urlAjax: '',
            searchProducts: [],
            countSearchProducts: 0,
            loading: false
        },
        methods: {
            buildSearchUrl: function (series) {
                series = series
                    .toLowerCase()
                    .replace(/[^a-zA-Zа-яА-ЯїЇіІьЬєЄэЭъЪёЁґҐ0-9 ]/gi, ' ')
                    .replace(/\s+/g, ' ')
                    .trim()
                    .replace(/\s/g, '+');

                return series;
            },
            search: function () {
                let _this = this;

                _this.url = '/search';

                if (_this.series !== '')
                {
                    _this.url += '/' + _this.buildSearchUrl(_this.series);

                    if (GD.LANGUAGE !== GD.DEFAULT_LANGUAGE)
                    {
                        _this.url += '/' + GD.LANGUAGE;
                    }

                    window.location.href = _this.url;
                }
            },
            searchAjax: _.debounce(function () {
                let _this = this;

                _this.urlAjax = '/search/async';

                _this.url = '/search';

                if (_this.series === '')
                {
                    _this.showNoResult = false;
                    _this.showResult = false;
                }

                if (_this.series !== '')
                {
                    _this.urlAjax += '/' + _this.buildSearchUrl(_this.series);

                    if (GD.LANGUAGE !== GD.DEFAULT_LANGUAGE)
                    {
                        _this.urlAjax += '/' + GD.LANGUAGE;
                    }

                    _this.url += '/' + _this.buildSearchUrl(_this.series);

                    if (GD.LANGUAGE !== GD.DEFAULT_LANGUAGE)
                    {
                        _this.url += '/' + GD.LANGUAGE;
                    }

                    _this.showNoResult = false;

                    _this.showResult = true;

                    _this.loading = true;

                    $.ajax({
                        type: 'get',
                        url: _this.urlAjax,
                        success: function (data) {
                            _this.loading = false;

                            _this.searchProducts = data.searchProducts;

                            _this.countSearchProducts = data.countSearchProducts;

                            _this.showNoResult = true;

                            _this.showResult = true;
                        },
                        error: function (error) {
                            _this.showNoResult = true;

                            _this.showResult = true;

                            console.log(error);
                        }
                    });
                }
            }, 450),
            onEsc: () => {
                let _this = this;

                $('#search').find('input').blur();

                _this.series = '';
            },
            onBlur: function(event) {
                let _this = this;
                if(!$(event.relatedTarget).hasClass('search-btn') &&
                    !$(event.relatedTarget).hasClass('all-search-results-btn') &&
                     !$(event.relatedTarget).hasClass('result-item-link') &&
                      !$(event.relatedTarget).hasClass('result-item'))
                {
                    _this.series = '';
                }

            }
        }
    });
}
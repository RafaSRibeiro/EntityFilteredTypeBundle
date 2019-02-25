$(document).ready(function () {
    let selectUpdates = $("[data-type='select-update']");
    selectUpdates.each(function (key, element) {
        let elementoId = $(this).data('depends-on-id');
        let routePath = $(this).data('route-path');
        let routeMethod = $(this).data('route-method');
        let loadingLabel = $(this).data('loading-label');
        let fieldQuery = $(this).data('field-query');
        let routeKey = $(this).data('route-key');
        let routeLabel = $(this).data('route-label');
        let elemento = document.getElementById(elementoId);

        const cleanOptions = (element) => {
            element.disabled = true;
            $(element).select2('destroy');
            $(element).select2();
        }

        elemento.onchange = function () {
            const query = {
                [fieldQuery]: $(this).val()
            };
            if ($(this).val()) {
                $.ajax({
                    type: routeMethod,
                    url: Routing.generate(routePath),
                    data: query,
                    beforeSend: function () {
                        element.innerHTML = '<option selected=\"selected\">' + loadingLabel + '</option>';
                        cleanOptions(element)
                    },
                    success: function (data) {
                        let values = JSON.parse(data);
                        element.disabled = false;
                        element.innerHTML = "";
                        values.map((value) => {
                            $(element).append('<option value="' + value[routeKey] + '">' + value[routeLabel] + '</option>');
                        });
                        $(element).select2('destroy');
                        $(element).select2();
                    }
                });
            } else {
                cleanOptions(element)
            }
        };
    });
});
jQuery(document).ready(function () {
//console.log(logocheck);
    if (window.matchMedia('(max-width: 665px)').matches) {
        var pdng = '';
        switch (jQuery(".top-header-widget ul").length) {
            case 1:
                if ( logocheck.txt && logocheck.logo)
                    pdng = '100px';
                if (!logocheck.txt && logocheck.logo)
                    pdng = "10px";
                if (logocheck.txt && logocheck.logo==0)
                    pdng = "10px";
                break;
            case 2:
                if (logocheck.txt && logocheck.logo)
                    pdng = "150px";
                if (!logocheck.txt && logocheck.logo)
                    pdng = "50px";
                if (logocheck.txt && logocheck.logo==0)
                    pdng = "50px";
                break;
            case 3:
                if (logocheck.txt && logocheck.logo)
                    pdng = "170px";
                if (!logocheck.txt && logocheck.logo)
                    pdng = "50px";
                if (logocheck.txt && logocheck.logo==0)
                    pdng = "50px";
                break;
            default:
                if (logocheck.txt && logocheck.logo)
                    pdng = "60px";
        }
        jQuery('.page-title-section .page-title').css("padding-top", pdng);
    }
});
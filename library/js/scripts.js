jQuery( document ).ready(function() {

//legacy browser svg support
svg4everybody();

// Styled select boxes
    jQuery('.gform_wrapper select').each(function(i){
        $this = jQuery(this);

        // Make new HTML select box
        var $styledSelect = jQuery('<div class="styled-select" data-select="select'+i+'" tabindex="0"><div class="selected">&nbsp;</div><ul></ul><span class="arw-right icon-svg"><svg><use xlink:href="/wp-content/uploads/spritemap.svg#arw-down"></use></svg></span></div>');
        $this.before($styledSelect);

        // Get all options from this select box
        jQuery('option:not(:empty)',this).each(function(){
            $styledSelect.find('ul').append('<li><a href="#" data-value="'+jQuery(this).val()+'">'+jQuery(this).text()+'</a></li>')
        });

        // Hide this select box
        $this.hide().attr('data-select','select'+i);
    });
    jQuery(document).on('click','.styled-select a',function(e){
        e.preventDefault();
        $this = jQuery(this);
        $select = $this.closest('.styled-select');

        // Change the text of selected
        $select.find('.selected').text($this.text()).addClass('changed');

        // Hide the dropdown
        jQuery('.styled-select').removeClass('hover').find('svg use').attr('xlink:href','/wp-content/uploads/spritemap.svg#arw-down');

        jQuery('select[data-select="'+$select.attr('data-select')+'"]').val(jQuery(this).attr('data-value'));

        // Unbind document close select
        jQuery(document).off('click.closeSelect');
    }).on('click','.styled-select .selected,.styled-select .arw-right',function(){
        $select = jQuery(this).closest('.styled-select');
        jQuery('.styled-select').not($select).removeClass('hover');
        $select.toggleClass('hover');

        // Change the arrow icon
        if($select.hasClass('hover')){
            $select.find('svg use').attr('xlink:href','/wp-content/uploads/spritemap.svg#arw-up');
        } else {
            $select.find('svg use').attr('xlink:href','/wp-content/uploads/spritemap.svg#arw-down');
        }
        // Change the arrow icon
        jQuery('.styled-select').not($select).find('svg use').attr('xlink:href','/wp-content/uploads/spritemap.svg#arw-down');

        // Close the select on blur
        window.setTimeout(function(){
            jQuery(document).one('click.closeSelect',function(e){
                if(!jQuery(e.target).closest('.styled-select').length){
                    $select.removeClass('hover');
                    $select.find('svg use').attr('xlink:href','/wp-content/uploads/spritemap.svg#arw-down');
                }
            });
        },0);
    }).on('keydown','.styled-select',function(e){
        if(e.keyCode == 32){
            e.preventDefault();
            jQuery(this).addClass('hover').find('li:first a').focus();
        }
        // Down arrow
        if(e.keyCode == 40){
            e.preventDefault();
            jQuery(this).find('a:focus').closest('li').next('li').find('a').focus();
        }
        // Up arrow
        if(e.keyCode == 38){
            e.preventDefault();
            jQuery(this).find('a:focus').closest('li').prev('li').find('a').focus();
        }
    }).on('blur','.styled-select',function(e){
        if(!jQuery(e.relatedTarget).closest('.styled-select').hasClass('hover')){
            jQuery('.styled-select').removeClass('hover');
        }
    });

//styled radios and checkboxes

jQuery('input[type="checkbox"]+label').each(function(){
        jQuery(this).prepend('<div><span class="icon-svg"><svg><use xlink:href="/wp-content/uploads/spritemap.svg#close"></use></svg></span></div>')
       });

jQuery('input[type="radio"]+label').each(function(){
        jQuery(this).prepend('<div></div>')
    });

});

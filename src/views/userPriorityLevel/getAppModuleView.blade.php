<style>
  ul {
    list-style: none;
  }

  ul .col-sm-12 .main-menu > label {
    display: block;
    color: #fff;
    background-color: #337ab7;
    padding-top: 7px;
    padding-bottom: 7px;
  }

  ul .col-sm-12 label > input ~ span {
    margin: 7px;
  }
</style>
<div class="priority-menus">
  {!! indent(generate_priority_menus($id)) !!}
</div>
<script>
    $('input[type=checkbox]').on("click", function () {
        let current_menu_id = $(this).val();
        if ($(this).is(':checked')) {

            let parent = $(this).attr('parent-id');
            $('#menu-id-' + parent).prop('checked', true);

            let grand_parent = $('#menu-id-' + parent).attr('parent-id');
            $('#menu-id-' + grand_parent).prop('checked', true);

            console.log(current_menu_id + " is checked!");
            console.log('Parent ID: ' + parent);
        } else {
            console.log(current_menu_id + " is unchecked!");

            let child = $('input[parent-id=' + current_menu_id + ']');
            child.prop('checked', false);

            child.each(function () {
                let next_child = $('input[parent-id=' + $(this).val() + ']');
                next_child.prop('checked', false);
            });
        }
    });

    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
    })
</script>

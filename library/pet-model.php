<?php

// Create Pet post type
if( function_exists( 'add_action' ) ):

add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'pet',
    array(
      'labels' => array(
        'name' => __( 'Pets' ),
        'singular_name' => __( 'Pet' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-carrot',
      'menu_position' => 3,
      'supports' => array( 'title', 'editor', 'comments' ),
    )
  );
}

endif;

if( function_exists( 'acf_add_local_field_group' ) ):

acf_add_local_field_group(array (
  'key' => 'group_55c2541eb201b',
  'title' => 'שדות בע״ח לאימוץ',
  'fields' => array (
    array (
      'key' => 'field_55c25434d0637',
      'label' => 'סוג',
      'name' => 'type',
      'type' => 'radio',
      'required' => 1,
      'choices' => array (
        'dog' => 'כלב',
        'cat' => 'חתול',
      ),
      'default_value' => 'dog',
      'layout' => 'horizontal',
    ),
    array (
      'key' => 'field_55c25454d0638',
      'label' => 'שם',
      'name' => 'pet_name',
      'type' => 'text',
      'required' => 1,
    ),
    array (
      'key' => 'field_55c25464d0639',
      'label' => 'מין',
      'name' => 'sex',
      'type' => 'radio',
      'required' => 0,
      'choices' => array (
        'male' => 'זכר',
        'female' => 'נקבה',
        'other' => 'אחר',
      ),
      'layout' => 'horizontal',
    ),
    array (
      'key' => 'field_55c254a4d063a',
      'label' => 'יום הולדת',
      'name' => 'birthday',
      'type' => 'date_picker',
      'instructions' => 'תאריך משוער (להצגת גיל)',
      'required' => 0,
      'display_format' => 'F j, Y',
      'return_format' => 'Ymd',
    ),
    array (
      'key' => 'field_55c2559dd063c',
      'label' => 'תמונות',
      'name' => 'pictures',
      'type' => 'gallery',
      'required' => 1,
      'min' => 1,
      'max' => '',
      'preview_size' => 'medium',
      'library' => 'all',
      'min_width' => '',
      'min_height' => '',
      'min_size' => '',
      'max_width' => '',
      'max_height' => '',
      'max_size' => '',
      'mime_types' => '',
    ),
    array (
      'key' => 'field_55c2718f74be4',
      'label' => 'מאפיינים',
      'name' => 'attributes',
      'type' => 'checkbox',
      'required' => 0,
      'choices' => array (
        'licker' => 'לקקן',
        'noble' => 'אצילי',
        'housebroken' => 'מחונך לצרכים',
        'energetic' => 'אוהב לשחק',
        'calm' => 'רגוע',
        'hypoallergenic' => 'היפו-אלרגי',
        'neutered' => 'מעוקרת/מסורס',
        'puppy' => 'גור',
        'low-shedder' => 'לא משיר שיער',
      ),
      'default_value' => array (
      ),
      'layout' => 'vertical',
      'toggle' => 0,
    ),
    array (
      'key' => 'field_55c2721b33b56',
      'label' => 'אומץ',
      'name' => 'adopted',
      'type' => 'true_false',
      'required' => 0,
      'message' => '',
      'default_value' => 0,
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'pet',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => array (
    0 => 'author',
    1 => 'featured_image',
    2 => 'categories',
  ),
));

acf_add_local_field_group(array (
  'key' => 'group_55d8b325ed736',
  'title' => 'הופעה בעמוד ראשי',
  'fields' => array (
    array (
      'key' => 'field_55d8b4fcff1a4',
      'label' => 'מופיע בעמוד ראשי?',
      'name' => 'homepage_index',
      'type' => 'select',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'choices' => array (
        0 => 'לא',
        1 => 1,
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
        6 => 6,
        7 => 7,
        8 => 8,
        9 => 9,
        10 => 10,
        11 => 11,
        12 => 12,
        13 => 13,
        14 => 14,
        15 => 15,
        16 => 16,
        17 => 17,
        18 => 18,
      ),
      'default_value' => array (0 => 0),
      'multiple' => 0,
    ),
    array (
      'key' => 'field_55d8b4f0911a6',
      'label' => 'עיצוב',
      'name' => 'box_theme',
      'type' => 'select',
      'choices' => array (
        'white' => 'לבן',
        'blue' => 'כחול',
        'orange' => 'כתום',
        'green' => 'ירוק',
        'notebook' => 'מחברת'
      ),
      'default_value' => array ('white' => 'לבן'),
    ),
    array (
      'key' => 'field_55d8cea22a961',
      'label' => 'קישור מצורף',
      'name' => 'link',
      'type' => 'url',
      'required' => 0,
      'placeholder' => 'http://',
    ),
    array (
      'key' => 'field_55d8c3a22a209',
      'label' => 'כותרת לקישור',
      'name' => 'link_text',
      'type' => 'text',
      'required' => 0,
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'location' => array (
    array (
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'pet',
      ),
    ),
    array (
      array (
        'param' => 'post_type',
        'operator' => '!=',
        'value' => 'pet',
      ),
    ),
  ),
));

endif;
?>

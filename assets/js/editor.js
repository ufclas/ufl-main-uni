wp.domReady( () => {
	wp.blocks.unregisterBlockStyle( 'core/button', 'default' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'squared' );


    wp.blocks.registerBlockStyle( 'core/button', {
        name: 'animated-border',
        label: 'Animated Border',
    } );

    wp.blocks.registerBlockStyle( 'core/button', {
        name: 'animated-underline',
        label: 'Animated Underline',
    } );

    wp.blocks.unregisterBlockStyle(
		'core/table',
		[ 'default','stripes' ]
	);

    wp.blocks.registerBlockStyle('core/table', [
        {
          name: 'stripes',
          label: 'Simple Rows',
        },
        {
          name: 'regular',
          label: 'Simple Column',

        },
      ]);






} );


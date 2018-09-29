( function( api ) {

	// Extends our custom "lz-fashion-ecommerce" section.
	api.sectionConstructor['lz-fashion-ecommerce'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
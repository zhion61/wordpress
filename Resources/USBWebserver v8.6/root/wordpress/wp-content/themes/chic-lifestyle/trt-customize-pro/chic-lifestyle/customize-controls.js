( function( api ) {

	// Extends our custom "chic-lifestyle" section.
	api.sectionConstructor['chic-lifestyle'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );

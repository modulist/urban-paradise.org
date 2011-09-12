var gotham = {
		src: path_to_theme+'/flash/gotham-reg-bd-ital.swf'
	  };


	
	  sIFR.debugMode = false;
	  sIFR.prefetch(gotham);
	  sIFR.activate(gotham);
		//


// --------------------- headline styles ----------------------------------

sIFR.replace(gotham, {
		selector: 'body.front #main h1, body.front #main h1.title'
		,wmode: 'transparent'
		,css: [
		  '.sIFR-root { color: #77a4be; margin: 0; text-transform: uppercase; letter-spacing: 1.5;}'
			 ,'a { color: #000099; text-decoration: none }'
			 ,'a:hover { color: #cc0000 }'
		]
	  });
sIFR.replace(gotham, {
		selector: '#main h1, #main h1.title'
		,wmode: 'transparent'
		,css: [
		  '.sIFR-root { color: #77a4be; margin: 0; text-transform: uppercase; letter-spacing: 1.5;}'
			 ,'a { color: #000099; text-decoration: none }'
			 ,'a:hover { color: #cc0000 }'
		]
	  });
sIFR.replace(gotham, {
		selector: '#main h2, #main h2.title'
		,wmode: 'transparent'
		,css: [
		  '.sIFR-root { color: #5d5a64; margin: 0; }'
			 ,'a { color: #000099; text-decoration: none }'
			 ,'a:hover { color: #cc0000 }'
		]
	  });

sIFR.replace(gotham, {
		selector: 'h2, h2.title'
		,wmode: 'transparent'
		,css: [
		  '.sIFR-root { color: #5d5a64; margin: 0; text-transform: uppercase; letter-spacing: 1.2}'
			 ,'a { color: #000099; text-decoration: none }'
			 ,'a:hover { color: #cc0000 }'
		]
	  });

sIFR.replace(gotham, {
		selector: '#main h3, #main h3.title, h3.title'
		,wmode: 'transparent'
		,css: [
		  '.sIFR-root { color: #5d5a64; margin: 0; padding-bottom: 0; }'
			 ,'a { color: #000099; text-decoration: none }'
			 ,'a:hover { color: #cc0000 }'
		]
	  });

sIFR.replace(gotham, {
		selector: '#main h4, #main h4.title'
		,wmode: 'transparent'
		,css: [
		  '.sIFR-root { color: #000000; margin: 0;}'
			 ,'a { color: #000099; text-decoration: none }'
			 ,'a:hover { color: #cc0000 }'
		]
	  });

// ------------------------------------------------------------------------------

sIFR.replace(gotham, {
		selector: '.page .testimonial-block .testimonial p, .page .testimonial-block .testimonial .hang-quote'
		,wmode: 'transparent'
		,css: [
		  '.sIFR-root { color: #3380ff; margin: 0;}'
			 ,'a { color: #000099; text-decoration: none }'
			 ,'a:hover { color: #cc0000 }'
		]
	  });

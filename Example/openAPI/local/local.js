var local = {
	apikey: "a2cb7f07bccde4a1a6b97347eed35e3e8cd7ee1e",
 	search : function() {
 		var query = $('#searchInput').val();
	    if (query)
	    {
	      this.script = document.createElement('script');
	      this.script.type ='text/javascript';
	      this.script.charset ='utf-8';		  
	      this.script.src = 'http://apis.daum.net/maps/addr2coord?apikey=' + local.apikey + '&output=json&callback=local.setResult&q=' + encodeURI(query);	
	      document.getElementsByTagName('head')[0].appendChild(this.script);
	    }
 	},
	setResult : function(data) {
		if(data.channel.item.length) {
			this.name = this.stripHTMLtag(this.escapeHtml(data.channel.item[0].title));
			$('#lat').text(data.channel.item[0].lat);
			$('#lng').text(data.channel.item[0].lng);		
		}
	},
	escapeHtml : function(str) 
	{
		str = str.replace(/&amp;/g, "&");
		str = str.replace(/&lt;/g, "<");
		str = str.replace(/&gt;/g, ">");
		return str;
	},
	
	stripHTMLtag : function(string) {
		var localStrip = new RegExp();
		localStrip = /[<][^>]*[>]/gi;
		return string.replace(localStrip, "");
	}
};
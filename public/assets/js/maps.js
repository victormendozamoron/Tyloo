var map = null;

var geocoder = new google.maps.Geocoder();

var listOfMarkerPopulate = new Array();

var markers = [];

var i = 0;

$(document).ready(function(){
	var myOptions = {
		zoom : 2,
		mapTypeId : google.maps.MapTypeId.ROADMAP,
		streetViewControl : true
	};
	
	map = new google.maps.Map(document.getElementById("maps-res"), myOptions);
	
	map.setCenter(new google.maps.LatLng(46.85, 1.75));
	
	var polyOptions = {
		strokeWeight: 0,
		fillOpacity: 0.45,
		editable: true
	};
	
	$("#request-permission").click(function(){
		window.webkitNotifications.requestPermission();
	});
	
	var numberToShow = 5;
	
	$("#dynnav div div.m-widget-body > ul").each(function() {
		if($('li', this).length > numberToShow) {
			$(this).find("li:gt("+(numberToShow - 1)+")").hide();
			$(this).append('<li class="more-nav"><a class="nav-title">More</a></li>');
		}
	});
	
	$(".more-nav").live('click', function() {
		$('li.nav:hidden:lt('+(numberToShow)+')', $(this).parent("ul")).show();
		if($('li.less-nav', $(this).parent("ul")).length == 0)
		{
			$('li.more-nav', $(this).parent("ul")).before('<li class="less-nav"><a class="nav-title">Less</a></li>');
		}
		if($('li.nav:hidden', $(this).parent("ul")).length == 0)
		{
			$('li.more-nav', $(this).parent("ul")).remove();
		}
	});
	
	$(".less-nav").live('click', function() {
		var length = $('li.nav:visible', $(this).parent("ul")).length;
		if (length - numberToShow > numberToShow)
		{
			$('li.nav:visible:gt('+(length - numberToShow - 1)+')', $(this).parent("ul")).hide();
		}
		else
		{
			$('li.nav:visible:gt('+(length - (length - numberToShow) - 1)+')', $(this).parent("ul")).hide();
		}

		if($('li.more-nav', $(this).parent("ul")).length == 0)
		{
			$('li.less-nav', $(this).parent("ul")).before('<li class="more-nav"><a class="nav-title">More</a></li>');
		}
		if ($('li.nav:visible', $(this).parent("ul")).length == numberToShow)
		{
			$('li.less-nav', $(this).parent("ul")).remove();
		}
	});
	
	$(".loupe").click(function() {
		if($(this).parent().has("li.search").length > 0) {
			$(this).parent().find("li.search").remove();
		}
		else {
			$(this).parent().find("li:first").after('<li class="nav search"><span class="search"><input type="text" class="look-in-nav"/></span></li>');
			$(this).parent().find("input").focus();
		}
	});
	
	$(".look-in-nav").live('keyup', function() {
		var html = "";
		$("#dyn-nav-res").html(html);
		var value = $(this).val();
		$('li',$(this).closest("ul")).each(function() {
			if($(this).text().toLowerCase().indexOf(value.toLowerCase()) != -1)
				html += '<li><a href="'+$(this).find("a").attr("href")+'">'+$(this).text().replace(new RegExp('('+value+')','gi'),'<span class="match">'+value+'</span>')+"</a></li>";
		});
		
		if(html.length > 0 && value.length > 0) {	
			var position = $(this).closest("ul").position();
			$("#dyn-nav-res").css({
				top: position.top + 56,
				left: position.left + 8 
			}).html("<ul>"+html+"</ul>").show();
		}
		else
			$("#dyn-nav-res").hide();
	});
	
	$('<div></div>')
		.prependTo("#content")
		.attr('id','dyn-nav-res')
		.attr('class','dyn-nav-res');
});

function oldGeocodeEntry(addr,html,type) {
	if (geocoder) {
		geocoder.geocode( { 'address': addr }, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				var markerPopulate = createMarker(results[0].geometry.location,html, type);
				listOfMarkerPopulate.push(markerPopulate.position);
				markers.push(markerPopulate);
				printCluster();
			}
		});
	}
}

function geocodeEntry(latLng,html,text,type) {
	var markerPopulate = createMarker(latLng,html,text,type);
	listOfMarkerPopulate.push(markerPopulate.position);
	markers.push(markerPopulate);
}

function printCluster() 
{
	if(typeof(markerClusterer) != 'undefined')
		markerClusterer.clearMarkers();
		
	markerClusterer = new MarkerClusterer(map, markers, {
    	maxZoom: 21,
    	gridSize:null,
    	styles: null
	});
}

function createMarker(point, html, text, type) 
{
  	var iconURI = "images/"+type+".png";

  	var marker = new google.maps.Marker({
		position: point, 
		animation: google.maps.Animation.DROP
	});

	marker.setIcon(iconURI);
	
	marker.setTitle(text);
	
	google.maps.event.addListener(marker, 'click', function() {
		var infowindow = new google.maps.InfoWindow({ 
			content: html
        });
		
        infowindow.open(map, marker);
  	});
	
	$("#res-"+i).live('click',function() {
		
		map.setCenter(marker.position);
        
        map.setZoom(9);
		
		var infowindow = new google.maps.InfoWindow({ 
			content: html
        });
		
        infowindow.open(map, marker);
	});
	
	i++;

	return marker;
}

//====== This function displays the tooltip ======
// it can be called from an icon mousover or a side_bar mouseover
function showTooltip(marker) {
	tooltip.innerHTML = marker.tooltip;
var point=map.getCurrentMapType().getProjection().fromLatLngToPixel(map.fromDivPixelToLatLng(new GPoint(0,0),true),map.getZoom());
var offset=map.getCurrentMapType().getProjection().fromLatLngToPixel(marker.getPoint(),map.getZoom());
var anchor=marker.getIcon().iconAnchor;
var width=marker.getIcon().iconSize.width;
var height=tooltip.clientHeight;
var pos = new GControlPosition(G_ANCHOR_TOP_LEFT, new GSize(offset.x - point.x - anchor.x + width, offset.y - point.y -anchor.y -height)); 
pos.apply(tooltip);
tooltip.style.visibility="visible";
}

// ===== This function is invoked when the mouse goes over an entry in the side_bar =====
// It launches the tooltip on the icon      
function mymouseover(i) {
  showTooltip(gmarkers[i])
}
// ===== This function is invoked when the mouse leaves an entry in the side_bar =====
// It hides the tooltip      
function mymouseout() {
tooltip.style.visibility="hidden";
}

function runNearMe()
{
	if(navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			var latLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
			var marker = new google.maps.Marker({
				position : latLng,
				map : map
			});
			map.setCenter(latLng);
			map.setZoom(9);
			var circle = new google.maps.Circle({
	          map: map,
	          fillColor: "#333333",
	          fillOpacity: "0.2",
	          strokeWeight : 1,
	          radius: 50000
	        });
	        
	        circle.bindTo('center', marker, 'position');
	        
	        var radius = circle.getBounds();
	        
	        var html = "";
	        
	        for(var marker in listOfMarkerPopulate) {
	        	if(radius.contains(listOfMarkerPopulate[marker])) {
	        		var currentMarker = markers[marker];
	        		html += currentMarker.getTitle();
	        	}
	        }
	        
	        if(html.length > 0)
	        {
	        	$("#infoRes").html(html);
	        }
	        
			if (window.webkitNotifications.checkPermission() == 0) {
				geocoder.geocode({'latLng': latLng}, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
        				if (results[0]) {
							var popup = window.webkitNotifications.createNotification("http://www.pdafr.com/g/f/cloche.gif", "Votre position courante a été détectée au :", results[0].formatted_address);
							popup.show();
							setTimeout(function(){
        						popup.cancel();
        					}, '3000');
						}
					}
				});
			}
		});
	}
}
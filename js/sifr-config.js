var tradegothic_boldtwo = {
	src: 'swf/tradegothic-boldtwo.swf'
};

var theCss = {'.sIFR-root' : { 'color': '#8b0304', 'leading': -2, 'kerning': -1/*, 'letter-spacing':'1'*/ }}

sIFR.activate(tradegothic_boldtwo);

sIFR.replace(tradegothic_boldtwo, {
	selector: '#welcomeInfo h1'
	,css: theCss
	,ratios: [10, 1.55, 19, 1.45, 32, 1.17, 71, 1.30, 1.25]
});

sIFR.replace(tradegothic_boldtwo, {
	selector: 'h1'
	,css: theCss
	,ratios: [10, 1.55, 19, 1.45, 32, 1.19, 71, 1.30, 1.25]
});



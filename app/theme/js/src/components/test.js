/* global TK */

const Test = (() => {

  let options = {
    onInit: () => {}
  };

  function init(params) {
    $.extend(options, params);

    if (TK.DEV_MODE) {
      console.log('[DEBUG] Test');
    }
    
  }

  return {
    init: init
  };

})();

export default Test;
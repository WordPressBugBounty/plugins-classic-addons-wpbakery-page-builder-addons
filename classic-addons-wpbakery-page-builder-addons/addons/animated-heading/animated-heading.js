jQuery(function($) {
    if ($('.caw-aheading-wrapper').length) {
        $('.caw-aheading-wrapper').each(function () {
            var $wrapper = $(this);
            var spinTime = $wrapper.data('time') || 3000;
            var words = [];

            $wrapper.find('.caw-aheadings-list li').each(function () {
                words.push($(this).text());
            });
            $wrapper.find('.caw-aheadings-list').remove();

            var $spin = $wrapper.find('.caw-aheading-spin');
            var $current = $spin.find('.current');
            var $next = $spin.find('.next span');
            let i = 0, i_next = 1;

            // Detect animation style
            var animationStyle = 'slide';
            if ($wrapper.hasClass('animation-type')) {
                animationStyle = 'type';
            }
            if ($wrapper.hasClass('animation-fade')) {
                animationStyle = 'fade';
            }

            if (animationStyle === 'slide') {
                // Existing slide animation
                $next.text(words[i_next]);
                $spin.width($current.width());

                setInterval(function () {
                    $spin.addClass('swap');
                    i = i_next;
                    i_next = (i_next + 1) % words.length;
                    $spin.width($next.width());

                    setTimeout(function () {
                        $next.text(words[i_next]);
                        $current.text(words[i]);
                        $spin.removeClass('swap');
                    }, 1000);
                }, spinTime);
			} else if (animationStyle === 'fade') {
			    function fadeCycle() {
			        $current.fadeOut(300, function () {
			            $current.text(words[i]).fadeIn(300);
			            i = (i + 1) % words.length;
			        });
			    }

			    $current.text(words[i]).show();
			    i = (i + 1) % words.length;
			    setInterval(fadeCycle, spinTime);
            } else if (animationStyle === 'type') {
                // Typewriter animation
                function typeWord(word, callback) {
                    let charIndex = 0;
                    $current.text('');
                    let typer = setInterval(function () {
                        if (charIndex < word.length) {
                            $current.text($current.text() + word[charIndex]);
                            charIndex++;
                        } else {
                            clearInterval(typer);
                            setTimeout(callback, 1000);
                        }
                    }, 100);
                }

                function deleteWord(callback) {
                    let currentText = $current.text();
                    let charIndex = currentText.length;
                    let deleter = setInterval(function () {
                        if (charIndex > 0) {
                            charIndex--;
                            $current.text(currentText.substring(0, charIndex));
                        } else {
                            clearInterval(deleter);
                            callback();
                        }
                    }, 50);
                }

                function cycleWords() {
                    typeWord(words[i], function () {
                        deleteWord(function () {
                            i = (i + 1) % words.length;
                            cycleWords();
                        });
                    });
                }

                if (words.length > 0) {
                    cycleWords();
                }
            }
        });
    }
});

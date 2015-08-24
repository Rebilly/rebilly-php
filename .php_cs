<?php
return Symfony\CS\Config\Config::create()
    ->finder(
        Symfony\CS\Finder\DefaultFinder::create()
            ->in(__DIR__ . '/src')
            ->in(__DIR__ . '/tests')
    )
    ->level(Symfony\CS\FixerInterface::PSR2_LEVEL)
    ->fixers([
        'phpdoc_indent',
        'phpdoc_no_access',
        'phpdoc_no_package',
        'phpdoc_scalar',
        'phpdoc_separation',
        'phpdoc_short_description',
        'phpdoc_to_comment',
        'phpdoc_trim',
        'phpdoc_type_to_var',
        'operators_spaces',
        'unary_operators_spaces',
        'unused_use',
        'ordered_use',
        'short_array_syntax',
        'return',
        'spaces_before_semicolon',
        'spaces_cast',
        'ternary_spaces',
        'eof_ending',
        'duplicate_semicolon',
        'empty_return',
        'join_function',
        'object_operator',
        'remove_lines_between_uses',
        'standardize_not_equal',
        'whitespacy_lines',
    ]);

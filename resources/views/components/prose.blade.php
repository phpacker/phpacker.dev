<div {{
    $attributes->merge([
        'class' => 'max-w-prose prose-zinc prose-sm prose-a:text-violet-600 dark:prose-a:text-violet-500 prose-code:bg-zinc-700 prose-code:py-1 prose-code:px-1.5 prose-code:rounded-sm prose-code:inset-shadow-sm',
    ])
}}>
    {{ $slot }}
</div>

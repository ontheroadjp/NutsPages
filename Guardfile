# A sample Guardfile
# More info at https://github.com/guard/guard#readme

guard 'phpunit', :cli => '--colors', :tests_path => 'vendor/ontheroadjp/NutsPages/tests' do
  watch(%r{^.*/vendor/ontheroadjp/NutsPages/tests/.+Test\.php$})
  watch(%r{^.*/vendor/ontheroadjp/NutsPages/src/Controllers/.+\.php$})
  watch(%r{^app/views/.+$}) { Dir.glob('tests/\**/*Test.php') }
  watch(%r{^.+Test\.php$})
  watch(%r{^.*\.php$})
end

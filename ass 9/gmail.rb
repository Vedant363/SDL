#bundle init
# Add this to your Gemfile

# gem 'gmail'

# Install the 'gmail' gem by running: bundle install

require 'gmail'

def send_email(sender_email, sender_password, recipient_email, subject, body)
  gmail = Gmail.connect(sender_email, sender_password)

  email = gmail.compose do
    to recipient_email
    subject subject
    body body
  end

  email.deliver!

  gmail.logout
end

# Example usage
sender_email = 'vedant.ghumade21@pccoepune.org'
sender_password = '121B10979'
recipient_email = 'ghumadevedant3@gmail.com'
subject = 'Test Email'
body = 'Jai Maharshtra Bhau'

send_email(sender_email, sender_password, recipient_email, subject, body)
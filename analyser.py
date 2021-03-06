import csv
from flask import Flask, render_template, request, redirect, url_for
#import mySQLdb
import re
import mmap

from nltk.tokenize import RegexpTokenizer
from nltk.corpus import wordnet

app = Flask(__name__)
#conn = MySQLdb.connect(host='localhost',user='root',password='',db='disease_database')


def tokenize_words(text):

    tokenizer = RegexpTokenizer("[\w']+|[\w'].")
    print(tokenizer)
    return tokenizer.tokenize(text.lower())


def replacement_patterns(text):
    print(text)

    replacement_patterns = [
        (r'won\'t', 'will not'),
        (r'can\'t', 'cannot'),
        (r'i\'m', 'i am'),
        (r'ain\'t', 'is not'),
        (r'(\w+)\'ll', '\g<1> will'),
        (r'(\w+)n\'t', '\g<1> not'),
        (r'(\w+)\'ve', '\g<1> have'),
        (r'(\w+)\'s', '\g<1> is'),
        (r'(\w+)\'re', '\g<1> are'),
        (r'(\w+)\'d', '\g<1> would')
    ]

    class RegexpReplacer(object):
        def __init__(self, patterns=replacement_patterns):
            self.patterns = [(re.compile(regex), repl)
                             for (regex, repl) in patterns]

        def replace(self, text):
            s = text
            for (pattern, repl) in self.patterns:
                s = re.sub(pattern, repl, s)
            return s

    replacer = RegexpReplacer()
    list_words = []
    for words in text:
        list_words.append(replacer.replace(words))
    return list_words


def replace(word, pos=None):

    antonyms = set()
    for syn in wordnet.synsets(word, pos=pos):
        for lemma in syn.lemmas():
            for antonym in lemma.antonyms():
                antonyms.add(antonym.name())
                if len(antonyms) == 1:
                    return antonyms.pop()

                else:
                    return None


def regex_search(filename, term):

    with open(filename, 'r') as file:
        for line in file:
            if line == term + "\n":
                return True


def list_creator(file_object):

    new_list = []
    for line in file_object:
        new_list.append(line.strip("\n"))
    return new_list


def polarity_finder(text):
    """
    Find polarity of text
    """
    polarity = 0
    length = len(text)
    with open('inc', 'r') as inc, open('dec', 'r') as dec, open('inv', 'r') as inv, open('positive', 'r') as pos, open(
            'negative', 'r') as neg:
        inc_word_list = list_creator(inc)
        dec_word_list = list_creator(dec)
        inv_word_list = list_creator(inv)
        pos_word_list = list_creator(pos)
        neg_word_list = list_creator(neg)
        for index, word in enumerate(text):
            if word in inc_word_list:
                const = 1
                while const <= 3:
                    if index + const < length:
                        if text[index + const] in pos_word_list:
                            polarity += 1
                        if text[index + const] in neg_word_list:
                            polarity -= 1
                    const += 1
            if word in dec_word_list:
                const = 1
                while const <= 3:
                    if index + const < length:
                        if text[index + const] in pos_word_list:
                            polarity -= 1
                        if text[index + const] in neg_word_list:
                            polarity += 1
                    const += 1

            if word in inv_word_list:
                const = 1
                while const <= 3:
                    if index + const < length:
                        ant = replace(text[index + const])
                        if ant:
                            if ant in pos_word_list:
                                polarity += 2
                            if ant in neg_word_list:
                                polarity -= 2
                    const += 1
            if word in pos_word_list:
                polarity += 1
            if word in neg_word_list:
                polarity -= 1
        return polarity


@app.route('/predict', methods=['GET'])
def disease_predict():
    f = open("newfile.txt", "r")

    textData = f.read()
    print(textData)
    datato = str(textData)

    polarity = polarity_finder(replacement_patterns(tokenize_words(datato)))
    print(polarity)

    # disease_list = []
    # for i in range(7):
    #     disease = diseaseprediction.dosomething(selected_symptoms)
    #     disease_list.append(disease)
    # return render_template('disease_predict.html',disease_list=disease_list)
    #disease = diseaseprediction.dosomething(selected_symptoms)
    return str(polarity)

# @app.route('/default')
# def default():
#         return render_template('includes/default.html')


if __name__ == '__main__':
    app.run(debug=True)
